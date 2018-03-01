<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
  protected $table = 'step';
  protected $primaryKey = 'id';

  protected $rules = [
    'active' => ['required']
  ];

  public function operations() {
      return $this->belongsToMany('App\Operation', 'operation_step', 'step_id', 'operation_id')->withTimestamps();;
  }

}
