<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationStep extends Model
{
  protected $table = 'operation_step';
  protected $primaryKey = 'id';

  protected $rules = [
    'operation_id' => ['required'],
    'step_id' => ['required']
  ];

}
