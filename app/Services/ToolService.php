<?php

namespace App\Services;

use App\Tooling;
use Illuminate\Support\Facades\File;

use Image;

class ToolService {

  public function getTool($id) {
    $tool = Tooling::find($id);
    return $tool;
  }

}

 ?>
