<?php

namespace App\Http\Controllers;
// For image resizer
// require 'vendor/autoload.php';

use App\Http\Controllers\Controller;
use App\Operation;
use App\OperationMedia;
use App\Part;
use App\Services\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Image;

// For image resizer
use Intervention\Image\ImageManager;

class OperationController extends Controller {

    private $service;

    // service to get all relationships with media
    public function __construct(MediaService $service) {
        $this->mediaService = $service;
    }

    public function add($partId) {
      $operation = new Operation;
      $part = Part::where('id', $partId)->get();
      $partOperations = Part::find($partId)->operations()->where('active', 1)->orderBy('order', 'asc')->get();
      // return $partOperations[0]->pivot->order;
      $partNumber = $part[0]['number'];
      $partName = $part[0]['name'];
      return view('admin.operation.add', ['operation' => $operation, 'partId' => $partId, 'partNumber' => $partNumber, 'partName' => $partName, 'items' => $partOperations]);
    }

    public function store(Request $request) {

      $operation = new Operation;
      $operation['title'] = $request['name'];
      $operation['desc'] = $request['desc'];
      $operation['active'] = 1;
      $order = $request['order'];
      $partId = $request['part'];
      $part = Part::where('id', $partId)->get();

      //validates photo media
      if(isset($request['media'])) {
        $this->validate($request, ['media' => 'mimes:jpeg,png,jpg,gif,svg']);
        //save media file in images folder
        $media_id = $this->mediaService->storeMedia($request);
      }

      // save info in database
      if (!$operation->save()) {
        $errors = $operation->getErrors();
        return redirect()->back()->with('errors', $errors)->withInput();
      }

      $operation->parts()->save($part[0], ['order' => $order]);

      if(isset($media_id)) {
        $order = Operation::find($operation['id'])->getMediaRelationship()->latest()->first();
        if (empty($order)) {
          $order = 1;
        }
        else {
          $order++;
        }
        $operMedia = new OperationMedia;
        $operMedia['operation_id'] = $operation['id'];
        $operMedia['media_id'] = $media_id;
        $operMedia['order'] = $order;

        // save relational info in database
        if (!$operMedia->save()) {
          $errors = $operMedia->getErrors();
          return redirect()->back()->with('errors', $errors)->withInput();
        }
      }

      // success
      $lastOper = $operation;

      return redirect()->action('StepController@add', ['id' => $lastOper['id'], 'operId' => $lastOper]);
    }

    public function list(Operation $operation) {
      $operation = Operation::where('active', 1)->orderBy('name', 'asc')->paginate(5);

      $count = Operation::where('active', 1)->get()->count();
      // return $tools;
      return view('admin.operation.list', ['items' => $operation, 'count' => $count]);
    }

    public function edit($id) {
      $operation = Operation::where('id', $id)->where('active', 1)->get();

      // get information about operation's part
      $partOperation = Operation::find($id)->parts()->get();

      // get information about operation's steps
      $operationSteps = Operation::find($id)->steps()->get();

      $operationMedia = Operation::find($id)->getMediaRelationship()->latest()->first();
      if (empty($operationMedia)) {
        $photo = 'images/noimage.jpg';
        $defaultPhoto = 1;
      }
      else {
        $media = $this->mediaService->getMedia($toolMedia['media_id']);
        $photo = 'images/'.$media['path'];
        $defaultPhoto = 0;
      }

      return view('admin.operation.edit', ['old' => $operation, 'id' => $id, 'partInfo' => $partOperation, 'items' => $operationSteps]);
    }

    public function update(Request $request) {
      $id = $request['id'];
      $operation = Operation::find($id);
      $operation['title'] = $request['name'];
      $operation['desc'] = $request['desc'];
      $order = $request['order'];

      // save info in database
      if (!$operation->save()) {
        $errors = $operation->getErrors();
        if($errors) {
          return redirect()->back()->with('errors', $errors)->withInput();
        }
      }
      //get part relationship information
      $part = $operation->parts()->get();

      //remove previous relationship and save new
      $operation->parts()->detach($part[0]);
      $operation->parts()->save($part[0], ['order' => $order]);

      //success
      $lastOper = $operation;
      return redirect()->action('StepController@add', ['id' => $lastOper['id'], 'operId' => $lastOper]);
    }

    public function destroy($id) {
      $operation = Operation::find($id);

      if (empty($operation)) {
        echo "not found id".$id;
      }
      else {
        if (!$operation->delete()) {
          $errors = $operation->getErrors();
          return redirect()->back()->with('errors', $errors)->withInput();
        }
        //success
        return redirect()->back()->with('message', 'Operation '. $operation->name . ' has been deleted!');
      }
    }

    public function destroyMedia($id) {
      $operMedia_id = Operation::find($id)->getMediaRelationship()->latest()->first();
      if (empty($operMedia_id['id'])) {
        return redirect()->back()->withErrors(['No photo to delete']);
      }
      $operMedia = OperationMedia::find($operMedia_id['id']);
      $media_id = $operMedia['media_id'];
      if (empty($operMedia)) {
        echo "not found id".$operMedia_id['id'];
      }
      else {
        $operMedia->delete();
        $deleteMedia = $this->mediaService->destroyMedia($media_id);
        //success
        // return redirect()->action('ToolingController@edit', ['id' => $id]);
      }
    }
}
