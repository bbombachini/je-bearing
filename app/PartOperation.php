<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartOperation extends Model
{
  protected $table = 'part_operation';
  protected $primaryKey = 'id';

  protected $rules = [
    'part_id' => ['required'],
    'operation_id' => ['required']
  ];

}
