<?php

namespace App\Http\Controllers;
// For image resizer
// require 'vendor/autoload.php';

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Part;
// use App\ToolingMedia;
use Illuminate\Http\Request;
// use App\Services\MediaService;
use App\Services\ToolService;
use App\Services\FixtureService;
use App\Services\MaterialService;
use Illuminate\Support\Facades\Log;

use Image;

// For image resizer
use Intervention\Image\ImageManager;

class PartController extends Controller {

    private $toolsrv;
    private $fixturesrv;
    private $materialsrv;

    public function __construct(ToolService $toolsrv, FixtureService $fixturesrv, MaterialService $materialsrv) {
        $this->toolService = $toolsrv;
        $this->fixtureService = $fixturesrv;
        $this->materialService = $materialsrv;
    }

    public function add() {
      $part = new Part;
      return view('admin.part.add', ['part' => $part]);
    }


    public function store(Request $request) {
      $part = new Part;
      $part['name'] = $request['name'];
      $part['number'] = $request['number'];
      $part['desc'] = $request['desc'];
      $part['active'] = 1;
      $part['category'] = $request['category'];
      $tools = $request['tooling'];
      $fixtures = $request['fixture'];
      $materials = $request['material'];

      Log::info($request);

      // save info in database
      if (!$part->save()) {
        $errors = $part->getErrors();
        if($errors) {
          return redirect()->action('PartController@add')->with('errors', $errors)->withInput();
        }
      }

      // save PartTooling relationship
      for($i = 0; $i < count($tools); $i++) {
        $tool = $this->toolService->getTool($tools[$i]);
        $part->tools()->save($tool);
      }

      // save PartFixture relationship
      for($i = 0; $i < count($fixtures); $i++) {
        $fixture = $this->fixtureService->getFixture($fixtures[$i]);
        $part->fixtures()->save($fixture);
      }

      // save PartMaterial relationship
      for($i = 0; $i < count($materials); $i++) {
        $material = $this->materialService->getMaterial($materials[$i]);
        $part->materials()->save($material);
      }

      //success
      $lastPart = $part;
      return $lastPart;
    }

    public function list(Part $part) {
      $parts = Part::where('active', 1)->orderBy('name', 'asc')->paginate(5);
      // foreach ($parts as $part) {
      //   // return $part['name'];
      //   // $toolMedia = Tooling::find($tool['id'])->getMediaRelationship()->latest()->first();
      //   // $media = $this->mediaService->getMedia($toolMedia['media_id']);
      //   // if(empty($media)){
      //   //   $tool['media_path'] = 'images/noimage.jpg';
      //   // }
      //   // else {
      //   //   $tool['media_path'] = $media['path'];
      //   // }
      //   $partTooling = Part::find($part['id'])->getToolingRelationship()->get();
      //   // $partTooling = Part::with('getToolingRelationship')->where('part_id', $part['id'])->get();
      //   for($i = 0; $i < count($partTooling); $i++) {
      //     Log::info($partTooling[$i]->part_id.' '.$partTooling[$i]->tool_id);
      //   }
      // }

      $count = Part::where('active', 1)->get()->count();
      // return $tools;
      return view('admin.part.list', ['items' => $parts, 'count' => $count]);
    }

    public function listPartTooling($id) {
      $tools = Part::find($id)->tools()->get();
      // return $tools;
      // return view('oper.item', ['items' => $parts, 'count' => $count]);
      return redirect()->action('ToolingController@opList', ['id' => $id]);
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
      $part = Part::where('id', $id)->get();
      $partTooling = Part::find($id)->getToolingRelationship()->get();
      $partFixture = Part::find($id)->getFixtureRelationship()->get();
      $partMaterial = Part::find($id)->getMaterialRelationship()->get();

      return (['item' => $part, 'tool' => $partTooling, 'fixture' => $partFixture, 'material' => $partMaterial]);
    }

    public function search($str, $field = 'name') {
      if(isset($str)) {
        $part = Part::where($field, 'LIKE' ,"{$str}%")->where('active', 1)->get();
        if(!$part->isEmpty()){
            return (['item' => $part]);
        } else {
          print "not-found";
        }
      }
      else {
        print "empty";
      }
    }

    public function getPartInfo($id){
      $part = Part::where('id', $id)->get();
      return $part;
    }
    // public function searchPartNumber(Request $number) {
    //   return $number['partnumber'];
      // if(isset($number)) {
      //   $part = Part::where('number','=',"{$number}")->get();
      //   if(!$part->isEmpty()){
      //       return $part;
      //       // return (['item' => $part]);
      //       // return redirect()->action('PartController@partTooling');
      //   } else {
      //     return redirect()->back()->withErrors(['Part Number not found']);
      //   }
      // }
      // else {
      //   return redirect()->back()->withErrors(['Please fill Part Number field']);
      // }
    // }

    public function edit($id) {
      $part = Part::where('id', $id)->where('active', 1)->get();
      $partTooling = Part::find($id)->tools()->get();
      $partFixture = Part::find($id)->fixtures()->get();
      $partMaterial = Part::find($id)->materials()->get();

      return view('admin.part.edit', ['old' => $part, 'id' => $id, 'oldTool' => $partTooling, 'oldFixture' => $partFixture, 'oldMaterial' => $partMaterial]);
    }

    public function update(Request $request) {
      $id = $request['id'];
      $part = Part::find($id);
      $part['name'] = $request['name'];
      $part['number'] = $request['number'];
      $part['category'] = $request['category'];
      $tools = $request['tooling'];
      $fixtures = $request['fixture'];
      $materials = $request['material'];

      // save info in database
      if (!$part->save()) {
        $errors = $part->getErrors();
        if($errors) {
          return redirect()->action('PartController@edit')->with('errors', $errors)->withInput();
        }
      }

      // save PartTooling relationship
      $part->tools()->sync($tools);

      // save PartFixture relationship
      $part->fixtures()->sync($fixtures);

      // save PartMaterial relationship
      $part->materials()->sync($materials);

      //success
      $lastPart = $part;
      return $lastPart;
    }


    public function destroy($id) {
      $part = Part::find($id);

      if (empty($part)) {
        echo "not found id".$id;
      }
      else {
        // do not delete entry from database
        // just change active value from 1 to 0
        $part['active'] = 0;
        if (!$part->save()) {
          $errors = $part->getErrors();
          return redirect()->action('PartController@list')->with('errors', $errors)->withInput();
        }
        //success
        return redirect()->action('PartController@list')->with('message', 'Your '. $part->name . ' has been created!');
      }
    }

    // public function editMedia($id) {
    //   $rel = Tooling::find($id)->getMediaRelationship()->latest()->first();
    //   return $rel;
    // }

    // public function destroyMedia($id) {
    //   $toolMedia_id = Tooling::find($id)->getMediaRelationship()->latest()->first();
    //   if (empty($toolMedia_id['id'])) {
    //     return redirect()->back()->withErrors(['No photo to delete']);
    //   }
    //   $toolMedia = ToolingMedia::find($toolMedia_id['id']);
    //   $media_id = $toolMedia['media_id'];
    //   if (empty($toolMedia)) {
    //     echo "not found id".$toolMedia_id['id'];
    //   }
    //   else {
    //     $toolMedia->delete();
    //     $deleteMedia = $this->mediaService->destroyMedia($media_id);
    //     //success
    //     return redirect()->action('ToolingController@edit', ['id' => $id]);
    //   }
    // }
}
