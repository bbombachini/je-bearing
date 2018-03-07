<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
  protected $table = 'material';
  protected $primaryKey = 'id';

  protected $rules = [
    'name' => ['required'],
    'active' => ['required']
  ];

  // Returns the first register of link table
  // This register provides the media_id that has to be selected on tbl_media
  public function getMediaRelationship() {
    return $this->hasOne('App\MaterialMedia', 'material_id', 'id');
  }

  public function parts() {
      return $this->belongsToMany('App\Part', 'part_material', 'material_id', 'part_id')->withTimestamps();;
  }

}
