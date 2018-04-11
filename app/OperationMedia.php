<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationMedia extends Model
{
  protected $table = 'operation_media';
  protected $primaryKey = 'id';

  protected $rules = [
    'operation_id' => ['required'],
    'media_id' => ['required'],
    'order' => ['required']
  ];

}
