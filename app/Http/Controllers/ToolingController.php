<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Controller;
use App\Tooling;
use Illuminate\Http\Request;

class ToolingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $model;

    public function __construct() {
      $this->model = new Tooling();
    }

    public function index()
    {
      // echo nl2br ("Tooling controller\n");
      // $tooling = $this->model->getAll();
      $tooling = Tooling::all();
      // $tooling = Tooling::find($tool_id);
      // print_r $tooling;
      // echo $tooling;
      // require_once('')
      // return $tooling;
      return view('test', ['tools' => $tooling, 'name' => 'Something']);
      // foreach ($tooling as $tool) {
      //     // echo nl2br ($tool->tool_desc."\n");
      //     return $tool->tool_name;
      // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
      $tool = new Tooling;
      return view('admin.tooling.add', ['tool' => $tool]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tool = new Tooling;

      $tool['tool_name'] = $request['name'];
      $tool['tool_desc'] = $request['desc'];
      $tool['tool_location'] = $request['location'];
      $tool['tool_active'] = 1;
      echo "Info stored";
      // echo $request['name'];
      // echo $tool;
      if (!$tool->save()) {
        $errors = $tool->getErrors();
        return redirect()->action('ToolingController@add')->with('errors', $errors)->withInput();
      }
      //success
      return redirect()->action('ToolingController@index')->with('message', 'Your '. $tool->tool_name . ' has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tooling  $tooling
     * @return \Illuminate\Http\Response
     */
    public function show(Tooling $tooling)
    {
      // $tool = new Tooling;
      // $tools = Tooling::all();
      $tools = Tooling::where('tool_active', 1)->orderBy('tool_name', 'asc')->get();
      return view('admin.tooling.show', ['tools' => $tools]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tooling  $tooling
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tool = Tooling::where('tool_id', $id)->where('tool_active', 1)->get();
      echo "EDIT ".$tool;
      // return view('admin.tooling.edit', ['old' => $tool]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tooling  $tooling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tooling $tooling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tooling  $tooling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tooling $tooling)
    {
        //
    }
}
