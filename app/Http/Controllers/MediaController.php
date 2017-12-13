<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller {

    protected $model;

    // not used
    public function add() {
      $media = new Media;
      return view('admin.media.add', ['media' => $media]);

    }


    public function store(Request $request) {
      $dir = '/images';
      // Log::info($request);
      $this->validate($request, ['input_media' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
      // Log::info('after validate');
      if ($request->hasFile('input_media')) {
        $image = $request->file('input_media');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path($dir);
        $image->move($destinationPath, $name);
      }
    }


    public function list(Tooling $tooling) {
      $tools = Tooling::where('tool_active', 1)->orderBy('tool_name', 'asc')->get();
      $count = $tools->count();
      return view('admin.tooling.list', ['tools' => $tools, 'count' => $count]);
    }


    public function edit($id) {
      $tool = Tooling::where('tool_id', $id)->where('tool_active', 1)->get();
      return view('admin.tooling.edit', ['old' => $tool, 'id' => $id]);
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
      return redirect()->action('ToolingController@index')->with('message', 'Your '. $tool->tool_name . ' has been created!');
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
