<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Fixture;
use Illuminate\Http\Request;

class FixtureController extends Controller {

    protected $model;


    public function index() {
      $fixture = Fixture::all();
      return view('test', ['fixtures' => $fixture, 'name' => 'Something']);
    }


    public function add() {
      $fixture = new Fixture;
      return view('admin.fixture.add', ['fixture' => $fixture]);
    }


    public function store(Request $request) {
      $fixture = new Fixture;
      $fixture['fixture_name'] = $request['name'];
      $fixture['fixture_number'] = $request['number'];
      $fixture['fixture_desc'] = $request['desc'];
      $fixture['fixture_active'] = 1;

      if (!$fixture->save()) {
        $errors = $fixture->getErrors();
        return redirect()->action('FixtureController@add')->with('errors', $errors)->withInput();
      }
      //success
      return redirect()->action('FixtureController@index')->with('message', 'Your '. $fixture->fixture_name . ' has been created!');
    }


    public function list(Fixture $fixture) {
      $fixtures = Fixture::where('fixture_active', 1)->orderBy('fixture_name', 'asc')->get();
      return view('admin.fixture.list', ['fixtures' => $fixtures]);
    }


    public function edit($id) {
      $fixture = Fixture::where('fixture_id', $id)->where('fixture_active', 1)->get();
      return view('admin.fixture.edit', ['old' => $fixture, 'id' => $id]);
    }


    public function update(Request $request) {
      $id = $request['id'];
      $fixture = Fixture::find($id);
      $fixture['fixture_name'] = $request['name'];
      $fixture['fixture_number'] = $request['number'];
      $fixture['fixture_desc'] = $request['desc'];

      if (!$fixture->save()) {
        $errors = $fixture->getErrors();
        return redirect()->action('FixtureController@edit/$id')->with('errors', $errors)->withInput();
      }
      //success
      return redirect()->action('FixtureController@index')->with('message', 'Your '. $fixture->fixture_name . ' has been created!');
    }


    public function destroy($id) {
      $fixture = Fixture::find($id);

      if (empty($fixture)) {
        echo "not found id".$id;
      }
      else {
        // do not delete entry from database
        // just change active value from 1 to 0
        $fixture['fixture_active'] = 0;
        if (!$fixture->save()) {
          $errors = $fixture->getErrors();
          return redirect()->action('FixtureController@list')->with('errors', $errors)->withInput();
        }
        //success
        return redirect()->action('FixtureController@list')->with('message', 'Your '. $fixture->fixture_name . ' has been created!');
      }
    }
}
