<?php

namespace App\Http\Controllers;
// For image resizer
// require 'vendor/autoload.php';

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Part;
use App\Operation;
use App\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Services\MediaService;
use App\Services\ToolService;
use App\Services\FixtureService;
use App\Services\MaterialService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ToolingController;

use Image;

// For image resizer
use Intervention\Image\ImageManager;

class PartController extends Controller {

    private $toolsrv;
    private $fixturesrv;
    private $materialsrv;

    public function __construct(ToolService $toolsrv, FixtureService $fixturesrv, MaterialService $materialsrv, MediaService $mediasrv) {
        $this->toolService = $toolsrv;
        $this->fixtureService = $fixturesrv;
        $this->materialService = $materialsrv;
        $this->mediaService = $mediasrv;
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

      $count = Part::where('active', 1)->get()->count();
      return view('admin.part.list', ['items' => $parts, 'count' => $count]);
    }

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

    // get information about operations and steps for a specific part on Operator view
    public function getPartInfo($id){
      $part = Part::where('id', $id)->get();
      $operations = Part::find($id)->operations()->orderBy('pivot_order', 'asc')->get();
      $stepInfo = [];
      $stepImg = [];
      foreach ($operations as $operation) {
        $steps = Operation::find($operation->id)->steps()->orderBy('pivot_order', 'asc')->get();
        $operation['steps'] = $steps;
        foreach ($steps as $step) {
          $stepMedia = Step::find($step->id)->getMediaRelationship()->get();
          if(!$stepMedia->isEmpty()){
            $stepInfo[] = $stepMedia;
            foreach ($stepMedia as $media){
              $img = $this->mediaService->getMedia($media['media_id']);
              $stepImg[] = $img;
            }
          }
        }
      }
      session(['partNumber'=> $part[0]->number]);
      session(['partId'=> $id]);
      return view('oper.steps', [ 'operations' => $operations, 'matchMedia' => $stepInfo, 'media' => $stepImg]);
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
}
