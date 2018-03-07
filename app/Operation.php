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

  public function parts() {
      return $this->belongsToMany('App\Part', 'part_operation', 'operation_id', 'part_id')->withTimestamps();;
  }

  public function steps() {
      return $this->belongsToMany('App\Step', 'operation_step', 'operation_id', 'step_id')->withTimestamps();;
  }

}
