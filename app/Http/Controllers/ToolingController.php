<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tooling;
use App\ToolingMedia;
use Illuminate\Http\Request;
use App\Services\MediaService;

class ToolingController extends Controller {

    private $service;

    public function __construct(MediaService $service) {
        $this->mediaService = $service;
    }


    public function index() {
      $tooling = Tooling::all();
      $count = $tooling->count();
      return view('admin.tooling.list', ['tools' => $tooling, 'count' => $count]);
    }


    public function add() {
      $tool = new Tooling;
      return view('admin.tooling.add', ['tool' => $tool]);
    }


    public function store(Request $request) {
      $tool = new Tooling;
      $tool['tool_name'] = $request['name'];
      $tool['tool_number'] = $request['number'];
      $tool['tool_desc'] = $request['desc'];
      $tool['tool_active'] = 1;
      //validates photo media
      $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',]);

      // save info in database
      if (!$tool->save()) {
        $errors = $tool->getErrors();
        return redirect()->action('ToolingController@add')->with('errors', $errors)->withInput();
      }
      //save media file in images folder
      $media_id = $this->mediaService->storeMedia($request);

      $order = Tooling::find($tool['tool_id'])->getMediaRelationship()->latest()->first();
      if (empty($order)) {
        $order = 1;
      }
      else {
        $order++;
      }
      $toolMedia = new ToolingMedia;
      $toolMedia['tool_id'] = $tool['tool_id'];
      $toolMedia['media_id'] = $media_id;
      $toolMedia['tool_media_order'] = $order;

      // save relational info in database
      if (!$toolMedia->save()) {
        $errors = $toolMedia->getErrors();
        return redirect()->action('ToolingController@add')->with('errors', $errors)->withInput();
      }

      //success
      return redirect()->action('ToolingController@list');
    }


    public function list(Tooling $tooling) {
      $tools = Tooling::where('tool_active', 1)->orderBy('tool_name', 'asc')->get();
      foreach ($tools as $tool) {
        $toolMedia = Tooling::find($tool['tool_id'])->getMediaRelationship()->latest()->first();
        $media = $this->mediaService->getMedia($toolMedia['media_id']);
        if(empty($media)){
          $tool['media_path'] = 'images/noimage.jpg';
        }
        else {
          $tool['media_path'] = $media['media_path'];
        }
      }
      $count = $tools->count();
      return view('admin.tooling.list', ['tools' => $tools, 'count' => $count]);
    }
    
    public function quickview($id) {
      $tool = Tooling::where('tool_id', $id)->get();
      return (['tool' => $tool]);
    }


    public function edit($id) {
      $tool = Tooling::where('tool_id', $id)->where('tool_active', 1)->get();
      $toolMedia = Tooling::find($id)->getMediaRelationship()->latest()->first();
      // return $toolMedia['media_id'];
      $media = $this->mediaService->getMedia($toolMedia['media_id']);
      $photo = 'images/'.$media['media_path'];

      return view('admin.tooling.edit', ['old' => $tool, 'photo' => $photo, 'id' => $id]);
    }

    public function update(Request $request) {
      $id = $request['id'];
      $tool = Tooling::find($id);
      $tool['tool_name'] = $request['name'];
      $tool['tool_number'] = $request['number'];
      $tool['tool_desc'] = $request['desc'];

      if (!$tool->save()) {
        $errors = $tool->getErrors();
        return redirect()->action('ToolingController@edit/$id')->with('errors', $errors)->withInput();
      }
      //success
      return redirect()->action('ToolingController@index');
    }


    public function destroy($id) {
      $tool = Tooling::find($id);

      if (empty($tool)) {
        echo "not found id".$id;
      }
      else {
        // do not delete entry from database
        // just change active value from 1 to 0
        $tool['tool_active'] = 0;
        if (!$tool->save()) {
          $errors = $tool->getErrors();
          return redirect()->action('ToolingController@list')->with('errors', $errors)->withInput();
        }
        //success
        return redirect()->action('ToolingController@list')->with('message', 'Your '. $tool->tool_name . ' has been created!');
      }
    }
}
