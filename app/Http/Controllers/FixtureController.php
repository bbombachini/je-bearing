<?php

namespace App\Http\Controllers;
// For image resizer
// require 'vendor/autoload.php';

use App\Http\Controllers\Controller;
use App\Fixture;
use App\FixtureMedia;
use Illuminate\Http\Request;
use App\Services\MediaService;
use Illuminate\Support\Facades\Log;

use Image;

// For image resizer
use Intervention\Image\ImageManager;

class FixtureController extends Controller {

    private $service;

    public function __construct(MediaService $service) {
        $this->mediaService = $service;
    }

    public function add() {
      $fixture = new Fixture;
      return view('admin.fixture.add', ['fixture' => $fixture]);
    }


    public function store(Request $request) {
      $fixture = new Fixture;
      $fixture['name'] = $request['name'];
      $fixture['number'] = $request['number'];
      $fixture['desc'] = $request['desc'];
      $fixture['active'] = 1;

      //validates photo media
      if(isset($request['media'])) {
        $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg']);
        //save media file in images folder
        $media_id = $this->mediaService->storeMedia($request);
      }

      // save info in database
      if (!$fixture->save()) {
        $errors = $fixture->getErrors();
        return redirect()->action('FixtureController@add')->with('errors', $errors)->withInput();
      }

      if(isset($media_id)) {
        $order = Fixture::find($fixture['id'])->getMediaRelationship()->latest()->first();
        if (empty($order)) {
          $order = 1;
        }
        else {
          $order++;
        }
        $fixtureMedia = new FixtureMedia;
        $fixtureMedia['fixture_id'] = $fixture['id'];
        $fixtureMedia['media_id'] = $media_id;
        $fixtureMedia['order'] = $order;

        // save relational info in database
        if (!$fixtureMedia->save()) {
          $errors = $fixtureMedia->getErrors();
          return redirect()->action('FixtureController@add')->with('errors', $errors)->withInput();
        }
      }

      //success
      return redirect()->action('FixtureController@list');
    }

    public function list(Fixture $fixture) {
      $fixtures = Fixture::where('active', 1)->orderBy('name', 'asc')->paginate(5);
      foreach ($fixtures as $fixture) {
        $fixtureMedia = Fixture::find($fixture['id'])->getMediaRelationship()->latest()->first();
        $media = $this->mediaService->getMedia($fixtureMedia['media_id']);
        if(empty($media)){
          $fixture['media_path'] = 'images/noimage.jpg';
        }
        else {
          $fixture['media_path'] = $media['path'];
        }
      }
      $count = Fixture::where('active', 1)->get()->count();
      // return $fixtures;
      return view('admin.fixture.list', ['items' => $fixtures, 'count' => $count]);
    }

    public function quickview($id) {
      $fixture = Fixture::where('id', $id)->get();
      $fixtureMedia = Fixture::find($id)->getMediaRelationship()->latest()->first();
        $media = $this->mediaService->getMedia($fixtureMedia['media_id']);
        if(empty($media)){
          $fixture['media_path'] = 'noimage.jpg';
        }
        else {
          $fixture['media_path'] = $media['path'];
        }
      return (['item' => $fixture]);
    }

    public function search($str) {
      if(isset($str)) {
        $fixture = Fixture::where('name','LIKE',"{$str}%")->get();
        if(!$fixture->isEmpty()){
            return (['item' => $fixture]);
        } else {
          print "not-found";
        }
      }
      else {
        print "empty";
      }
    }


    public function edit($id) {
      $fixture = Fixture::where('id', $id)->where('active', 1)->get();
      $fixtureMedia = Fixture::find($id)->getMediaRelationship()->latest()->first();
      if (empty($fixtureMedia)) {
        $photo = 'images/noimage.jpg';
        $defaultPhoto = 1;
      }
      else {
        $media = $this->mediaService->getMedia($fixtureMedia['media_id']);
        $photo = 'images/'.$media['path'];
        $defaultPhoto = 0;
      }

      return view('admin.fixture.edit', ['old' => $fixture, 'photo' => $photo, 'id' => $id, 'defaultPhoto' => $defaultPhoto]);
    }

    public function update(Request $request) {
      $id = $request['id'];
      $fixture = Fixture::find($id);
      $fixture['name'] = $request['name'];
      $fixture['number'] = $request['number'];
      $fixture['desc'] = $request['desc'];

      if(isset($request['media'])) {
        $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg',]);
        //save media file in images folder
        $media_id = $this->mediaService->storeMedia($request);
      }

      if (!$fixture->save()) {
        $errors = $fixture->getErrors();
        return redirect()->action('FixtureController@edit', ['id' => $id])->with('errors', $errors)->withInput();
      }

      if(isset($media_id)) {
        $rel = Fixture::find($fixture['id'])->getMediaRelationship()->latest()->first();
        if (empty($rel)) {
          $order = 1;
        }
        else {
          $order = $rel['order']+1;
          $deleteMedia = FixtureController::destroyMedia($id);
        }
        $fixtureMedia = new FixtureMedia;
        $fixtureMedia['fixture_id'] = $id;
        $fixtureMedia['media_id'] = $media_id;
        $fixtureMedia['order'] = $order;

        // save relational info in database
        if (!$fixtureMedia->save()) {
          $errors = $fixtureMedia->getErrors();
          return redirect()->action('FixtureController@edit', ['id' => $id])->with('errors', $errors)->withInput();
        }
      }

      //success
      return redirect()->action('FixtureController@list');
    }


    public function destroy($id) {
      $fixture = Fixture::find($id);

      if (empty($fixture)) {
        echo "not found id".$id;
      }
      else {
        // do not delete entry from database
        // just change active value from 1 to 0
        $fixture['active'] = 0;
        if (!$fixture->save()) {
          $errors = $fixture->getErrors();
          return redirect()->action('FixtureController@list')->with('errors', $errors)->withInput();
        }
        //success
        return redirect()->action('FixtureController@list')->with('message', 'Your '. $fixture->name . ' has been created!');
      }
    }

    public function editMedia($id) {
      $rel = Fixture::find($id)->getMediaRelationship()->latest()->first();
      return $rel;
    }

    public function destroyMedia($id) {
      $fixtureMedia_id = Fixture::find($id)->getMediaRelationship()->latest()->first();
      if (empty($fixtureMedia_id['id'])) {
        return redirect()->back()->withErrors(['No photo to delete']);
      }
      $fixtureMedia = FixtureMedia::find($fixtureMedia_id['id']);
      $media_id = $fixtureMedia['media_id'];
      if (empty($fixtureMedia)) {
        echo "not found id".$fixtureMedia_id['id'];
      }
      else {
        $fixtureMedia->delete();
        $deleteMedia = $this->mediaService->destroyMedia($media_id);
        //success
        return redirect()->action('FixtureController@edit', ['id' => $id]);
      }
    }
}
