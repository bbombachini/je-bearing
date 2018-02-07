<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartTooling extends Model
{
  protected $table = 'part_tool';
  protected $primaryKey = 'id';

  protected $rules = [
    'part_id' => ['required'],
    'tool_id' => ['required']
  ];

}
