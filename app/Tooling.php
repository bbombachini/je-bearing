<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tooling extends Model
{
  protected $table = 'tool';
  protected $primaryKey = 'id';

  protected $rules = [
    'name' => ['required'],
    'number' => ['required'],
    'active' => ['required']
  ];

  // Returns the first register of link table tbl_tool_media
  // This register provides the media_id that has to be selected on tbl_media
  public function getMediaRelationship() {
    return $this->hasOne('App\ToolingMedia', 'tool_id', 'id');
  }

  public function parts() {
      return $this->belongsToMany('App\Part', 'part_tool', 'tool_id', 'part_id')->withTimestamps();;
  }

}
