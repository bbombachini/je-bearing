<?php

namespace App\Services;

use App\Material;
use Illuminate\Support\Facades\File;

use Image;

class MaterialService {

  public function getMaterial($id) {
    $material = Material::find($id);
    return $material;
  }

}

 ?>
