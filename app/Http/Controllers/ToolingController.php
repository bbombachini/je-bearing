<?php

namespace App\Http\Controllers;
// For image resizer
// require 'vendor/autoload.php';

use App\Http\Controllers\Controller;
use App\Tooling;
use App\Part;
use App\ToolingMedia;
use Illuminate\Http\Request;
use App\Services\MediaService;
use Illuminate\Support\Facades\Log;

use Image;

// For image resizer
use Intervention\Image\ImageManager;

class ToolingController extends Controller {

    private $service;

    public function __construct(MediaService $service) {
        $this->mediaService = $service;
    }

    // public function index() {
    //   $tooling = Tooling::all();
    //   $count = $tooling->count();
    //   return view('admin.tooling.list', ['tools' => $tooling, 'count' => $count]);
    // }

    public function add() {
      $tool = new Tooling;
      return view('admin.tooling.add', ['tool' => $tool]);
    }

// Image is being stored ans resized in a function called storeMedia in Media Services.php app/services/MediaService.php

    public function store(Request $request) {
      $tool = new Tooling;
      $tool['name'] = $request['name'];
      $tool['number'] = $request['number'];
      $tool['desc'] = $request['desc'];
      $tool['active'] = 1;

      //validates photo media
      if(isset($request['media'])) {
        $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg']);
        //save media file in images folder
        $media_id = $this->mediaService->storeMedia($request);
      }

      // save info in database
      if (!$tool->save()) {
        $errors = $tool->getErrors();
        return redirect()->action('ToolingController@add')->with('errors', $errors)->withInput();
      }

      if(isset($media_id)) {
        $order = Tooling::find($tool['id'])->getMediaRelationship()->latest()->first();
        if (empty($order)) {
          $order = 1;
        }
        else {
          $order++;
        }
        $toolMedia = new ToolingMedia;
        $toolMedia['tool_id'] = $tool['id'];
        $toolMedia['media_id'] = $media_id;
        $toolMedia['order'] = $order;

        // save relational info in database
        if (!$toolMedia->save()) {
          $errors = $toolMedia->getErrors();
          return redirect()->action('ToolingController@add')->with('errors', $errors)->withInput();
        }
      }

      //success
      return redirect()->action('ToolingController@list');
    }

    public function list(Tooling $tooling) {
      $tools = Tooling::where('active', 1)->orderBy('name', 'asc')->paginate(5);
      foreach ($tools as $tool) {
        $toolMedia = Tooling::find($tool['id'])->getMediaRelationship()->latest()->first();
        $media = $this->mediaService->getMedia($toolMedia['media_id']);
        if(empty($media)){
          $tool['media_path'] = 'images/noimage.jpg';
        }
        else {
          $tool['media_path'] = $media['path'];
        }
      }
      $count = Tooling::where('active', 1)->get()->count();
      // return $tools;
      return view('admin.tooling.list', ['items' => $tools, 'count' => $count]);
    }

    public function opList($id) {
      $items = Part::find($id)->tools()->where('active', 1)->orderBy('name', 'asc')->paginate(6);
      foreach ($items as $item) {
        $itemMedia = Tooling::find($item['id'])->getMediaRelationship()->latest()->first();
        $media = $this->mediaService->getMedia($itemMedia['media_id']);
        if(empty($media)){
          $item['media_path'] = 'noimage.jpg';
        }
        else {
          $item['media_path'] = $media['path'];
        }
      }
      return view('oper.items', ['items' => $items, 'pid' => $id, 'title' => 'Tooling', 'name' => 'tools']);
    }

    public function quickview($id) {
      $tool = Tooling::where('id', $id)->get();
      $toolMedia = Tooling::find($id)->getMediaRelationship()->latest()->first();
        $media = $this->mediaService->getMedia($toolMedia['media_id']);
        if(empty($media)){
          $tool['media_path'] = 'noimage.jpg';
        }
        else {
          $tool['media_path'] = $media['path'];
        }
      return (['item' => $tool]);
    }

    public function search($str) {
      if(isset($str)) {
        $tool = Tooling::where('name','LIKE',"{$str}%")->where('active', 1)->get();
        if(!$tool->isEmpty()){
            return (['item' => $tool]);
        } else {
          print "not-found";
        }
      }
      else {
        print "empty";
      }
    }


    public function edit($id) {
      $tool = Tooling::where('id', $id)->where('active', 1)->get();
      $toolMedia = Tooling::find($id)->getMediaRelationship()->latest()->first();
      if (empty($toolMedia)) {
        $photo = 'images/noimage.jpg';
        $defaultPhoto = 1;
      }
      else {
        $media = $this->mediaService->getMedia($toolMedia['media_id']);
        $photo = 'images/'.$media['path'];
        $defaultPhoto = 0;
      }

      return view('admin.tooling.edit', ['old' => $tool, 'photo' => $photo, 'id' => $id, 'defaultPhoto' => $defaultPhoto]);
    }

    public function update(Request $request) {
      $id = $request['id'];
      $tool = Tooling::find($id);
      $tool['name'] = $request['name'];
      $tool['number'] = $request['number'];
      $tool['desc'] = $request['desc'];

      if(isset($request['media'])) {
        $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg',]);
        //save media file in images folder
        $media_id = $this->mediaService->storeMedia($request);
      }

      if (!$tool->save()) {
        $errors = $tool->getErrors();
        return redirect()->action('ToolingController@edit', ['id' => $id])->with('errors', $errors)->withInput();
      }

      if(isset($media_id)) {
        $rel = Tooling::find($tool['id'])->getMediaRelationship()->latest()->first();
        if (empty($rel)) {
          $order = 1;
        }
        else {
          $order = $rel['order']+1;
          $deleteMedia = ToolingController::destroyMedia($id);
        }
        $toolMedia = new ToolingMedia;
        $toolMedia['tool_id'] = $id;
        $toolMedia['media_id'] = $media_id;
        $toolMedia['order'] = $order;

        // save relational info in database
        if (!$toolMedia->save()) {
          $errors = $toolMedia->getErrors();
          return redirect()->action('ToolingController@edit', ['id' => $id])->with('errors', $errors)->withInput();
        }
      }

      //success
      return redirect()->action('ToolingController@list');
    }


    public function destroy($id) {
      $tool = Tooling::find($id);

      if (empty($tool)) {
        echo "not found id".$id;
      }
      else {
        // do not delete entry from database
        // just change active value from 1 to 0
        $tool['active'] = 0;
        if (!$tool->save()) {
          $errors = $tool->getErrors();
          return redirect()->action('ToolingController@list')->with('errors', $errors)->withInput();
        }
        //success
        return redirect()->action('ToolingController@list')->with('message', 'Your '. $tool->name . ' has been created!');
      }
    }

    public function editMedia($id) {
      $rel = Tooling::find($id)->getMediaRelationship()->latest()->first();
      return $rel;
    }

    public function destroyMedia($id) {
      $toolMedia_id = Tooling::find($id)->getMediaRelationship()->latest()->first();
      if (empty($toolMedia_id['id'])) {
        return redirect()->back()->withErrors(['No photo to delete']);
      }
      $toolMedia = ToolingMedia::find($toolMedia_id['id']);
      $media_id = $toolMedia['media_id'];
      if (empty($toolMedia)) {
        echo "not found id".$toolMedia_id['id'];
      }
      else {
        $toolMedia->delete();
        $deleteMedia = $this->mediaService->destroyMedia($media_id);
        //success
        return redirect()->action('ToolingController@edit', ['id' => $id]);
      }
    }
}
