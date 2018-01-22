<?php

namespace App\Services;

use App\Media;
use Illuminate\Support\Facades\File;

use Image;

class MediaService {

  public function getMedia($id) {
    $media = Media::find($id);
    return $media;
  }

  public function storeMedia($input) {
    $dir = 'images';
    if ($input->hasFile('media')) {
      $image = $input->file('media');
      $name = time().'.'.$image->getClientOriginalExtension();
      $img = Image::make($image);
      // $img = Image::make(Request::file('media'));
      $img->orientate();
      $img->resize(400, null, function($constraint){ 
      $constraint->upsize();
      $constraint->aspectRatio();
      });
      $img->save(public_path('/images/' . $name));

      // $destinationPath = $dir;
      // $image->move($destinationPath, $name);
    }
    $media = new Media;
    $media['media_path'] = $name;

    if (!$media->save()) {
      $errors = $media->getErrors();
      return redirect()->back()->with('errors', $errors)->withInput();
    }
    return $media->media_id;
  }

  public function destroyMedia($id){
    $media = Media::find($id);
    $file = $media['media_path'];
    $media->delete();
    File::delete('images/'.$file);
    return;
  }

}

 ?>
