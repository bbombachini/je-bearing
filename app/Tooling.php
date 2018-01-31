<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tooling extends Model
{
  protected $table = 'tool';
  protected $primaryKey = 'id';

  protected $rules = [
    'name' => ['required'],
    'active' => ['required']
  ];

  // Returns the first register of link table tbl_tool_media
  // This register provides the media_id that has to be selected on tbl_media
  public function getMediaRelationship() {
    return $this->hasOne('App\ToolingMedia', 'tool_id', 'id');
    // return $this->has('App\ToolingMedia', 'tool_id', 'tool_id');
  }

  // public function storeMediaRelationship($tool_id, $media_id) {
  //   $last = $this->hasOne('App\ToolingMedia', 'tool_id', 'tool_id')->where('tool_id', $tool_id)->latest()->first()->get();
  //
  // }

}
