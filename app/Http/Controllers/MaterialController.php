<?php

namespace App\Http\Controllers;
// For image resizer
// require 'vendor/autoload.php';

use App\Http\Controllers\Controller;
use App\Material;
use App\MaterialMedia;
use Illuminate\Http\Request;
use App\Services\MediaService;
use Illuminate\Support\Facades\Log;

use Image;

// For image resizer
use Intervention\Image\ImageManager;

class MaterialController extends Controller {

    private $service;

    public function __construct(MediaService $service) {
        $this->mediaService = $service;
    }

    public function add() {
      $material = new Material;
      return view('admin.material.add', ['material' => $material]);
    }


    public function store(Request $request) {
      $material = new Material;
      $material['name'] = $request['name'];
      $material['number'] = $request['number'];
      $material['desc'] = $request['desc'];
      $material['active'] = 1;

      //validates photo media
      if(isset($request['media'])) {
        $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg']);
        //save media file in images folder
        $media_id = $this->mediaService->storeMedia($request);
      }

      // save info in database
      if (!$material->save()) {
        $errors = $material->getErrors();
        return redirect()->action('MaterialController@add')->with('errors', $errors)->withInput();
      }

      if(isset($media_id)) {
        $order = Material::find($material['id'])->getMediaRelationship()->latest()->first();
        if (empty($order)) {
          $order = 1;
        }
        else {
          $order++;
        }
        $materialMedia = new MaterialMedia;
        $materialMedia['material_id'] = $material['id'];
        $materialMedia['media_id'] = $media_id;
        $materialMedia['order'] = $order;

        // save relational info in database
        if (!$materialMedia->save()) {
          $errors = $materialMedia->getErrors();
          return redirect()->action('MaterialController@add')->with('errors', $errors)->withInput();
        }
      }

      //success
      return redirect()->action('MaterialController@list');
    }

    public function list(Material $material) {
      $materials = Material::where('active', 1)->orderBy('name', 'asc')->paginate(5);
      foreach ($materials as $material) {
        $materialMedia = Material::find($material['id'])->getMediaRelationship()->latest()->first();
        $media = $this->mediaService->getMedia($materialMedia['media_id']);
        if(empty($media)){
          $material['media_path'] = 'images/noimage.jpg';
        }
        else {
          $material['media_path'] = $media['path'];
        }
      }
      $count = Material::where('active', 1)->get()->count();
      // return $fixtures;
      return view('admin.material.list', ['items' => $materials, 'count' => $count]);
    }

    ///MAKE AN ITEM CONTROLLER?

    public function opList(Material $material) {
      $items = Material::where('active', 1)->orderBy('name', 'asc')->paginate(6);
      foreach ($items as $item) {
        $itemMedia = Material::find($item['id'])->getMediaRelationship()->latest()->first();
        $media = $this->mediaService->getMedia($itemMedia['media_id']);
        if(empty($media)){
          $item['media_path'] = 'noimage.jpg';
        }
        else {
          $item['media_path'] = $media['path'];
        }
      }
        // return $materials;
        return view('oper.items', ['items' => $items, 'title' => 'Materials', 'name' => 'materials']);
    }

    public function quickview($id) {
      $material = Material::where('id', $id)->get();
      $materialMedia = Material::find($id)->getMediaRelationship()->latest()->first();
        $media = $this->mediaService->getMedia($materialMedia['media_id']);
        if(empty($media)){
          $material['media_path'] = 'noimage.jpg';
        }
        else {
          $material['media_path'] = $media['path'];
        }
      return (['item' => $material]);
    }

    public function search($str) {
      if(isset($str)) {
        $material = Material::where('name','LIKE',"{$str}%")->get();
        if(!$material->isEmpty()){
            return (['item' => $material]);
        } else {
          print "not-found";
        }
      }
      else {
        print "empty";
      }
    }


    public function edit($id) {
      $material = Material::where('id', $id)->where('active', 1)->get();
      $materialMedia = Material::find($id)->getMediaRelationship()->latest()->first();
      if (empty($materialMedia)) {
        $photo = 'images/noimage.jpg';
        $defaultPhoto = 1;
      }
      else {
        $media = $this->mediaService->getMedia($materialMedia['media_id']);
        $photo = 'images/'.$media['path'];
        $defaultPhoto = 0;
      }

      return view('admin.material.edit', ['old' => $material, 'photo' => $photo, 'id' => $id, 'defaultPhoto' => $defaultPhoto]);
    }

    public function update(Request $request) {
      $id = $request['id'];
      $material = Material::find($id);
      $material['name'] = $request['name'];
      $material['number'] = $request['number'];
      $material['desc'] = $request['desc'];

      if(isset($request['media'])) {
        $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg',]);
        //save media file in images folder
        $media_id = $this->mediaService->storeMedia($request);
      }

      if (!$material->save()) {
        $errors = $material->getErrors();
        return redirect()->action('MaterialController@edit', ['id' => $id])->with('errors', $errors)->withInput();
      }

      if(isset($media_id)) {
        $rel = Material::find($material['id'])->getMediaRelationship()->latest()->first();
        if (empty($rel)) {
          $order = 1;
        }
        else {
          $order = $rel['order']+1;
          $deleteMedia = MaterialController::destroyMedia($id);
        }
        $materialMedia = new MaterialMedia;
        $materialMedia['material_id'] = $id;
        $materialMedia['media_id'] = $media_id;
        $materialMedia['order'] = $order;

        // save relational info in database
        if (!$materialMedia->save()) {
          $errors = $materialMedia->getErrors();
          return redirect()->action('MaterialController@edit', ['id' => $id])->with('errors', $errors)->withInput();
        }
      }

      //success
      return redirect()->action('MaterialController@list');
    }


    public function destroy($id) {
      $material = Material::find($id);

      if (empty($material)) {
        echo "not found id".$id;
      }
      else {
        // do not delete entry from database
        // just change active value from 1 to 0
        $material['active'] = 0;
        if (!$material->save()) {
          $errors = $material->getErrors();
          return redirect()->action('MaterialController@list')->with('errors', $errors)->withInput();
        }
        //success
        return redirect()->action('MaterialController@list')->with('message', 'Your '. $material->name . ' has been created!');
      }
    }

    public function editMedia($id) {
      $rel = Material::find($id)->getMediaRelationship()->latest()->first();
      return $rel;
    }

    public function destroyMedia($id) {
      $materialMedia_id = Material::find($id)->getMediaRelationship()->latest()->first();
      if (empty($materialMedia_id['id'])) {
        return redirect()->back()->withErrors(['No photo to delete']);
      }
      $materialMedia = MaterialMedia::find($materialMedia_id['id']);
      $media_id = $materialMedia['media_id'];
      if (empty($materialMedia)) {
        echo "not found id".$materialMedia_id['id'];
      }
      else {
        $materialMedia->delete();
        $deleteMedia = $this->mediaService->destroyMedia($media_id);
        //success
        return redirect()->action('MaterialController@edit', ['id' => $id]);
      }
    }
}
