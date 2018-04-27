<?php

namespace App\Http\Controllers;
// For image resizer
// require 'vendor/autoload.php';

use App\Http\Controllers\Controller;
use App\User;
// use App\ToolingMedia;
use Illuminate\Http\Request;
use App\Services\MediaService;
use Illuminate\Support\Facades\Log;

use Image;

// For image resizer
use Intervention\Image\ImageManager;

class UsersController extends Controller {

    private $service;

    public function __construct(MediaService $service) {
        $this->mediaService = $service;
    }

    public function add() {
      $user = new User;
      return view('admin.user.add', ['user' => $user]);
    }

    public function store(Request $request) {
      $user = new User;
      $user['fname'] = $request['fname'];
      $user['lname'] = $request['lname'];
      $user['email'] = $request['email'];
      $user['password'] = bcrypt($request['password']);
      $user['employee_id'] = $request['employee_id'];
      $user['role'] = $request['role'];
      $user['phone'] = $request['phone'];
      $user['repair_access'] = $request['repair_access'];
      $user['instructions_access'] = $request['instructions_access'];
      $user['assembly_access'] = $request['assembly_access'];
      $user['active'] = 1;

      //validates photo media
      if(isset($request['media'])) {
        $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg',]);
        //save media file in images folder
        $photo = $this->mediaService->storeUserPhoto($request);
        if($photo) {
          $user['photo'] = $photo;
        }
      }

      // save info in database
      if (!$user->save()) {
        $errors = $user->getErrors();
        return redirect()->action('UsersController@add')->with('errors', $errors)->withInput();
      }

      //success
      return redirect()->action('UsersController@list');
    }

    public function list(User $user) {
      $users = User::where('active', 1)->orderBy('lname', 'asc')->paginate(10);
      $count = User::where('active', 1)->get()->count();
      // return $tools;
      return view('admin.user.list', ['users' => $users, 'count' => $count]);
    }

    public function quickview($id) {
      $user = User::where('id', $id)->get();
      return (['item' => $user]);
    }

    public function search($str) {
      if(isset($str)) {
        $user = User::where(function ($query) use ($str) {
          $query->where('fname','LIKE',"{$str}%")
                ->orWhere('lname','LIKE',"{$str}%");
        })->get();

        if(!$user->isEmpty()){
            return (['item' => $user]);
        } else {
          print "not-found";
        }
      }
      else {
        print "empty";
      }
    }

    public function edit($id) {
      $user = User::where('id', $id)->where('active', 1)->get();

      if ($user[0]['photo'] === 'images/default.jpg') {
        $defaultPhoto = 1;
      }
      else {
        $defaultPhoto = 0;
      }

      return view('admin.user.edit', ['old' => $user, 'id' => $id, 'defaultPhoto' => $defaultPhoto]);
    }

    public function update(Request $request) {
      $id = $request['id'];
      $user = User::find($id);
      $user['fname'] = $request['fname'];
      $user['lname'] = $request['lname'];
      $user['email'] = $request['email'];
      $user['employee_id'] = $request['employee_id'];
      $user['role'] = $request['role'];
      $user['phone'] = $request['phone'];
      $user['repair_access'] = $request['repair_access'];
      $user['instructions_access'] = $request['instructions_access'];
      $user['assembly_access'] = $request['assembly_access'];

      if(!empty($request['password'])) {
        $user['password'] = bcrypt($request['password']);
      }

      $oldPhoto = false;
      if(isset($request['media'])) {
        if($user['photo'] != 'images/default.jpg') {
          $oldPhoto = $user['photo'];
        }
        $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg',]);
        //save media file in images folder
        $photo = $this->mediaService->storeUserPhoto($request);
        if($photo) {
          $user['photo'] = $photo;
        }
      }

      if (!$user->save()) {
        $errors = $user->getErrors();
        return redirect()->action('UsersController@edit', ['id' => $id])->with('errors', $errors)->withInput();
      }
      // if changing photo, remove previous photo if it existed
      else if($oldPhoto) {
        $deleteMedia = $this->mediaService->destroyUserPhoto($oldPhoto);
      }

      //success
      return redirect()->action('UsersController@list');
    }

    public function destroy($id) {
      $user = User::find($id);

      if (empty($user)) {
        echo "not found id".$id;
      }
      else {
        // do not delete entry from database
        // just change active value from 1 to 0
        $user['active'] = 0;
        if (!$user->save()) {
          $errors = $user->getErrors();
          return redirect()->action('UsersController@list')->with('errors', $errors)->withInput();
        }
        //success
        return redirect()->action('UsersController@list');
      }
    }

    public function destroyMedia($id) {
      $user = User::find($id);
      if (empty($user['photo']) === 'images/default.jpg') {
        return redirect()->back()->withErrors(['No photo to delete']);
      }
      else {
        $photo_path = $user['photo'];
        $user['photo'] = 'images/default.jpg';

        //success
        if (!$user->save()) {
          $errors = $user->getErrors();
          return redirect()->action('UsersController@edit', ['id' => $id])->with('errors', $errors)->withInput();
        }
        else {
          $deleteMedia = $this->mediaService->destroyUserPhoto($photo_path);
          return redirect()->action('UsersController@edit', ['id' => $id]);
        }
      }
    }
}
