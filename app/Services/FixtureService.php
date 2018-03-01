<?php

namespace App\Services;

use App\Fixture;
use Illuminate\Support\Facades\File;

use Image;

class FixtureService {

  public function getFixture($id) {
    $fixture = Fixture::find($id);
    return $fixture;
  }

}

 ?>
