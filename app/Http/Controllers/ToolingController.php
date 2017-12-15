<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Tooling;
use Illuminate\Http\Request;

class ToolingController extends Controller {

    protected $model;


    // public function index() {
    //   $tooling = Tooling::all();
    //   $count = $tooling->count();
    //   return view('admin.tooling.list', ['tools' => $tooling, 'count' => $count]);
    // }


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

      if (!$tool->save()) {
        $errors = $tool->getErrors();
        return redirect()->action('ToolingController@add')->with('errors', $errors)->withInput();
      }
      //success
      return redirect()->action('ToolingController@list');
    }


    public function list(Tooling $tooling) {
      $tools = Tooling::where('tool_active', 1)->orderBy('tool_name', 'asc')->get();
      // $count = Tooling::where('tool_active', 1)->get();
      $count = $tools->count();
      return view('admin.tooling.list', ['tools' => $tools, 'count' => $count]);
    }

    public function quickview($id) {
      $tool = Tooling::where('tool_id', $id)->get();
      return (['tool' => $tool]);
    }


    public function edit($id) {
      $tool = Tooling::where('tool_id', $id)->where('tool_active', 1)->get();
      // echo "EDIT ".$tool;
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
