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

    // public function __construct(MediaService $service) {
    //     $this->mediaService = $service;
    // }

    // public function index() {
    //   $tooling = Tooling::all();
    //   $count = $tooling->count();
    //   return view('admin.tooling.list', ['tools' => $tooling, 'count' => $count]);
    // }

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
      // if(isset($request['media'])) {
      //   $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg']);
      //   //save media file in images folder
      //   $media_id = $this->mediaService->storeMedia($request);
      // }

      // save info in database
      if (!$user->save()) {
        $errors = $user->getErrors();
        return redirect()->action('UsersController@add')->with('errors', $errors)->withInput();
      }

      // if(isset($media_id)) {
      //   $order = Tooling::find($tool['id'])->getMediaRelationship()->latest()->first();
      //   if (empty($order)) {
      //     $order = 1;
      //   }
      //   else {
      //     $order++;
      //   }
      //   $toolMedia = new ToolingMedia;
      //   $toolMedia['tool_id'] = $tool['id'];
      //   $toolMedia['media_id'] = $media_id;
      //   $toolMedia['order'] = $order;
      //
      //   // save relational info in database
      //   if (!$toolMedia->save()) {
      //     $errors = $toolMedia->getErrors();
      //     return redirect()->action('ToolingController@add')->with('errors', $errors)->withInput();
      //   }
      // }

      //success
      return redirect()->action('UsersController@list');
    }

    public function list(User $user) {
      $users = User::where('active', 1)->orderBy('lname', 'asc')->paginate(10);
      // foreach ($users as $user) {
      //   $toolMedia = Tooling::find($tool['id'])->getMediaRelationship()->latest()->first();
      //   $media = $this->mediaService->getMedia($toolMedia['media_id']);
      //   if(empty($media)){
      //     $tool['media_path'] = 'images/noimage.jpg';
      //   }
      //   else {
      //     $tool['media_path'] = $media['path'];
      //   }
      // }
      $count = User::where('active', 1)->get()->count();
      // return $tools;
      return view('admin.user.list', ['users' => $users, 'count' => $count]);
    }

    //TEMPORARY FUNCTION - CHANGE LATER
    // public function opList(Tooling $tooling) {
    //   $items = Tooling::where('active', 1)->orderBy('name', 'asc')->paginate(6);
    //   // $items = DB::table('tool')
    //   //       ->join('part', 'users.id', '=', 'contacts.user_id')
    //   //       ->join('orders', 'users.id', '=', 'orders.user_id')
    //   //       ->select('users.*', 'contacts.phone', 'orders.price')
    //   //       ->get();
    //   foreach ($items as $item) {
    //     $itemMedia = Tooling::find($item['id'])->getMediaRelationship()->latest()->first();
    //     $media = $this->mediaService->getMedia($itemMedia['media_id']);
    //     if(empty($media)){
    //       $item['media_path'] = 'noimage.jpg';
    //     }
    //     else {
    //       $item['media_path'] = $media['path'];
    //     }
    //   }
    //     // return $tools;
    //     return view('oper.items', ['items' => $items, 'title' => 'Tooling', 'name' => 'tools']);
    // }

    public function quickview($id) {
      $tool = User::where('id', $id)->get();
      return (['item' => $user]);
    }

    // public function search($str) {
    //   if(isset($str)) {
    //     $tool = Tooling::where('name','LIKE',"{$str}%")->get();
    //     if(!$tool->isEmpty()){
    //         return (['item' => $tool]);
    //     } else {
    //       print "not-found";
    //     }
    //   }
    //   else {
    //     print "empty";
    //   }
    // }


    public function edit($id) {
      $user = User::where('id', $id)->where('active', 1)->get();
      // $toolMedia = Tooling::find($id)->getMediaRelationship()->latest()->first();
      // if (empty($toolMedia)) {
        // $photo = 'images/noimage.jpg';
        $defaultPhoto = 1;
      // }
      // else {
      //   $media = $this->mediaService->getMedia($toolMedia['media_id']);
      //   $photo = 'images/'.$media['path'];
      //   $defaultPhoto = 0;
      // }

      // return view('admin.user.edit', ['old' => $user, 'photo' => $photo, 'id' => $id, 'defaultPhoto' => $defaultPhoto]);
      return view('admin.user.edit', ['old' => $user, 'id' => $id, 'defaultPhoto' => $defaultPhoto]);
    }

    public function update(Request $request) {
      $id = $request['id'];
      $user = User::find($id);
      $user['fname'] = $request['fname'];
      $user['lname'] = $request['lname'];
      $user['email'] = $request['email'];
      // $user['password'] = bcrypt($request['password']);
      $user['employee_id'] = $request['employee_id'];
      $user['role'] = $request['role'];
      $user['phone'] = $request['phone'];
      $user['repair_access'] = $request['repair_access'];
      $user['instructions_access'] = $request['instructions_access'];
      $user['assembly_access'] = $request['assembly_access'];

      // if(isset($request['media'])) {
      //   $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg',]);
      //   //save media file in images folder
      //   $media_id = $this->mediaService->storeMedia($request);
      // }

      if (!$user->save()) {
        $errors = $user->getErrors();
        return redirect()->action('UsersController@edit', ['id' => $id])->with('errors', $errors)->withInput();
      }

      // if(isset($media_id)) {
      //   $rel = Tooling::find($tool['id'])->getMediaRelationship()->latest()->first();
      //   if (empty($rel)) {
      //     $order = 1;
      //   }
      //   else {
      //     $order = $rel['order']+1;
      //     $deleteMedia = ToolingController::destroyMedia($id);
      //   }
      //   $toolMedia = new ToolingMedia;
      //   $toolMedia['tool_id'] = $id;
      //   $toolMedia['media_id'] = $media_id;
      //   $toolMedia['order'] = $order;
      //
      //   // save relational info in database
      //   if (!$toolMedia->save()) {
      //     $errors = $toolMedia->getErrors();
      //     return redirect()->action('ToolingController@edit', ['id' => $id])->with('errors', $errors)->withInput();
      //   }
      // }

      //success
      return redirect()->action('UsersController@list');
    }




}
