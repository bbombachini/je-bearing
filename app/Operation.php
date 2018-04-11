<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
  protected $table = 'operation';
  protected $primaryKey = 'id';

  protected $rules = [
    'active' => ['required']
  ];

  // get all parts that the operation belongs to
  public function parts() {
      return $this->belongsToMany('App\Part', 'part_operation', 'operation_id', 'part_id')->withTimestamps();;
  }

  // get all steps that belong to the operation
  public function steps() {
      return $this->belongsToMany('App\Step', 'operation_step', 'operation_id', 'step_id')->withTimestamps();;
  }

  // get all images (media) related to the operation
  public function getMediaRelationship() {
    return $this->hasOne('App\OperationMedia', 'operation_id', 'id');
  }

}
