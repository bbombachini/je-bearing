<?php

namespace App\Http\Controllers;
// For image resizer
// require 'vendor/autoload.php';

use App\Http\Controllers\Controller;
use App\Operation;
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
      // return $part[0]['number'];
      $partNumber = $part[0]['number'];
      $partName = $part[0]['name'];
      return view('admin.operation.add', ['operation' => $operation, 'partId' => $partId, 'partNumber' => $partNumber, 'partName' => $partName]);
    }

    public function store(Request $request) {
      $operation = new Operation;
      $operation['name'] = $request['name'];
      $operation['active'] = 1;

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

      if(isset($media_id)) {
        $order = Operation::find($operation['id'])->getMediaRelationship()->latest()->first();
        if (empty($order)) {
          $order = 1;
        }
        else {
          $order++;
        }
        $operMedia = new ToolingMedia;
        $operMedia['tool_id'] = $operation['id'];
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
      return $lastOper;

      // return redirect()->action('StepController@add', ['operId' => $lastId]);
    }

    public function list(Operation $operation) {
      $operation = Operation::where('active', 1)->orderBy('name', 'asc')->paginate(5);

      $count = Operation::where('active', 1)->get()->count();
      // return $tools;
      return view('admin.operation.list', ['items' => $operation, 'count' => $count]);
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

    // public function quickview($id) {
    //   $part = Part::where('id', $id)->get();
    //   $partTooling = Part::find($id)->getToolingRelationship()->get();
    //   $partFixture = Part::find($id)->getFixtureRelationship()->get();
    //   $partMaterial = Part::find($id)->getMaterialRelationship()->get();
    //
    //   return (['item' => $part, 'tool' => $partTooling, 'fixture' => $partFixture, 'material' => $partMaterial]);
    // }

    // public function search($str) {
    //   if(isset($str)) {
    //     $part = Part::where('name','LIKE',"{$str}%")->get();
    //     if(!$part->isEmpty()){
    //         return (['item' => $part]);
    //     } else {
    //       print "not-found";
    //     }
    //   }
    //   else {
    //     print "empty";
    //   }
    // }


    public function edit($id) {
      $operation = Operation::where('id', $id)->where('active', 1)->get();
      // $partTooling = Part::find($id)->getToolingRelationship()->get();
      // $partFixture = Part::find($id)->getFixtureRelationship()->get();
      // $partMaterial = Part::find($id)->getMaterialRelationship()->get();
      // $partTooling = Part::find($id)->tools()->get();
      // $partFixture = Part::find($id)->fixtures()->get();
      // $partMaterial = Part::find($id)->materials()->get();
      // $toolMedia = Tooling::find($id)->getMediaRelationship()->latest()->first();
      // if (empty($toolMedia)) {
      //   $photo = 'images/noimage.jpg';
      //   $defaultPhoto = 1;
      // }
      // else {
      //   $media = $this->mediaService->getMedia($toolMedia['media_id']);
      //   $photo = 'images/'.$media['path'];
      //   $defaultPhoto = 0;
      // }

      // return view('admin.part.edit', ['old' => $part, 'photo' => $photo, 'id' => $id, 'defaultPhoto' => $defaultPhoto]);
      return view('admin.operation.edit', ['old' => $operation, 'id' => $id]);
    }

    public function update(Request $request) {
      $id = $request['id'];
      $operation = Operation::find($id);
      $operation['title'] = $request['title'];
      $operation['desc'] = $request['desc'];

      // $tools = $request['tooling'];
      // $fixtures = $request['fixture'];
      // $materials = $request['material'];

      // save info in database
      if (!$operation->save()) {
        $errors = $operation->getErrors();
        if($errors) {
          return redirect()->back()->with('errors', $errors)->withInput();
        }
      }

      // // save PartTooling relationship
      // for($i = 0; $i < count($tools); $i++) {
      //   $tool = $this->toolService->getTool($tools[$i]);
      //   $part->tools()->save($tool);
      // }
      //
      // // save PartFixture relationship
      // for($i = 0; $i < count($fixtures); $i++) {
      //   $fixture = $this->fixtureService->getFixture($fixtures[$i]);
      //   $part->fixtures()->save($fixture);
      // }
      //
      // // save PartMaterial relationship
      // for($i = 0; $i < count($materials); $i++) {
      //   $material = $this->materialService->getMaterial($materials[$i]);
      //   $part->materials()->save($material);
      // }

      //success
      return redirect()->back();
    }


    public function destroy($id) {
      $operation = Operation::find($id);

      if (empty($operation)) {
        echo "not found id".$id;
      }
      else {
        // do not delete entry from database
        // just change active value from 1 to 0
        $operation['active'] = 0;
        if (!$operation->save()) {
          $errors = $operation->getErrors();
          return redirect()->back()->with('errors', $errors)->withInput();
        }
        //success
        return redirect()->back->with('message', 'Operation '. $operation->name . ' has been deleted!');
      }
    }
}
