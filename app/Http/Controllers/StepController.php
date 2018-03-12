<?php

namespace App\Http\Controllers;
// For image resizer
// require 'vendor/autoload.php';

use App\Http\Controllers\Controller;
use App\Step;
use App\StepMedia;
use Illuminate\Http\Request;
use App\Services\MediaService;
use Illuminate\Support\Facades\Log;

use Image;

// For image resizer
use Intervention\Image\ImageManager;

class StepController extends Controller {

    private $service;

    public function __construct(MediaService $service) {
        $this->mediaService = $service;
    }

    public function add() {
      $step = new Step;
      return view('admin.step.add', ['step' => $step]);
    }


    public function store(Request $request) {
      $step = new Step;
      $step['title'] = $request['title'];
      $step['desc'] = $request['desc'];
      $step['active'] = 1;

      //validates photo media
      if(isset($request['media'])) {
        $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg']);
        //save media file in images folder
        $media_id = $this->mediaService->storeMedia($request);
      }

      // save info in database
      if (!$step->save()) {
        $errors = $step->getErrors();
        return redirect()->back()->with('errors', $errors)->withInput();
      }

      if(isset($media_id)) {
        $order = Step::find($step['id'])->getMediaRelationship()->latest()->first();
        if (empty($order)) {
          $order = 1;
        }
        else {
          $order++;
        }
        $stepMedia = new StepMedia;
        $stepMedia['step_id'] = $step['id'];
        $stepMedia['media_id'] = $media_id;
        $stepMedia['order'] = $order;

        // save relational info in database
        if (!$stepMedia->save()) {
          $errors = $stepMedia->getErrors();
          return redirect()->back()->with('errors', $errors)->withInput();
        }
      }

      //success
      return redirect()->back();
    }

    public function list(Step $step) {
      $steps = Step::where('active', 1)->orderBy('title', 'asc')->paginate(5);
      foreach ($steps as $step) {
        $stepMedia = Step::find($step['id'])->getMediaRelationship()->latest()->first();
        $media = $this->mediaService->getMedia($stepMedia['media_id']);
        if(empty($media)){
          $step['media_path'] = 'images/noimage.jpg';
        }
        else {
          $step['media_path'] = $media['path'];
        }
      }
      $count = Step::where('active', 1)->get()->count();
      // return $tools;
      return view('admin.step.list', ['items' => $steps, 'count' => $count]);
    }

    //TEMPORARY FUNCTION - CHANGE LATER


    // public function quickview($id) {
    //   $tool = Tooling::where('id', $id)->get();
    //   $toolMedia = Tooling::find($id)->getMediaRelationship()->latest()->first();
    //     $media = $this->mediaService->getMedia($toolMedia['media_id']);
    //     if(empty($media)){
    //       $tool['media_path'] = 'noimage.jpg';
    //     }
    //     else {
    //       $tool['media_path'] = $media['path'];
    //     }
    //   return (['item' => $tool]);
    // }

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
      $step = Step::where('id', $id)->where('active', 1)->get();
      $stepMedia = Step::find($id)->getMediaRelationship()->latest()->first();
      if (empty($stepMedia)) {
        $photo = 'images/noimage.jpg';
        $defaultPhoto = 1;
      }
      else {
        $media = $this->mediaService->getMedia($stepMedia['media_id']);
        $photo = 'images/'.$media['path'];
        $defaultPhoto = 0;
      }

      return view('admin.step.edit', ['old' => $step, 'photo' => $photo, 'id' => $id, 'defaultPhoto' => $defaultPhoto]);
    }

    public function update(Request $request) {
      $id = $request['id'];
      $step = Step::find($id);
      $step['title'] = $request['title'];
      $step['desc'] = $request['desc'];

      if(isset($request['media'])) {
        $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg',]);
        //save media file in images folder
        $media_id = $this->mediaService->storeMedia($request);
      }

      if (!$step->save()) {
        $errors = $step->getErrors();
        // return redirect()->action('ToolingController@edit', ['id' => $id])->with('errors', $errors)->withInput();
      }

      if(isset($media_id)) {
        $rel = Step::find($step['id'])->getMediaRelationship()->latest()->first();
        if (empty($rel)) {
          $order = 1;
        }
        else {
          $order = $rel['order']+1;
          // $deleteMedia = StepController::destroyMedia($id);
        }
        $stepMedia = new StepMedia;
        $stepMedia['step_id'] = $id;
        $stepMedia['media_id'] = $media_id;
        $stepMedia['order'] = $order;

        // save relational info in database
        if (!$stepMedia->save()) {
          $errors = $stepMedia->getErrors();
          // return redirect()->action('ToolingController@edit', ['id' => $id])->with('errors', $errors)->withInput();
        }
      }

      //success
      // return redirect()->action('ToolingController@list');
    }


    public function destroy($id) {
      $step = Step::find($id);

      if (empty($step)) {
        echo "not found id".$id;
      }
      else {
        // do not delete entry from database
        // just change active value from 1 to 0
        $step['active'] = 0;
        if (!$step->save()) {
          $errors = $step->getErrors();
          // return redirect()->action('ToolingController@list')->with('errors', $errors)->withInput();
        }
        //success
        // return redirect()->action('ToolingController@list')->with('message', 'Your '. $tool->name . ' has been created!');
      }
    }

    public function destroyMedia($id) {
      $stepMedia_id = Step::find($id)->getMediaRelationship()->latest()->first();
      if (empty($stepMedia_id['id'])) {
        return redirect()->back()->withErrors(['No photo to delete']);
      }
      $stepMedia = StepMedia::find($stepMedia_id['id']);
      $media_id = $stepMedia['media_id'];
      if (empty($stepMedia)) {
        echo "not found id".$stepMedia_id['id'];
      }
      else {
        $stepMedia->delete();
        $deleteMedia = $this->mediaService->destroyMedia($media_id);
        //success
        // return redirect()->action('ToolingController@edit', ['id' => $id]);
      }
    }
}
