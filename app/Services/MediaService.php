<?php

namespace App\Services;

use App\Media;
use App\ToolingMedia;

class ToolMediaService {
  // public function getMediaRelationship($id) {
  //
  // }
  public function storeToolMedia() {
    $row = new ToolingMedia;
    $row['tool_id'] = $tool_id;
    $row['media_id'] = $media_id;
    $row['tool_media_order'] = $order;

    if (!$row->save()) {
      $errors = $row->getErrors();
      return redirect()->action('ToolingController@add')->with('errors', $errors)->withInput();
    }
    return;
  }
}

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
      // $destinationPath = public_path($dir);
      $destinationPath = $dir;
      $image->move($destinationPath, $name);
    }
    $media = new Media;
    $media['media_path'] = $name;

    if (!$media->save()) {
      $errors = $media->getErrors();
      return redirect()->back()->with('errors', $errors)->withInput();
    }
    return $media->media_id;
  }

}

 ?>
