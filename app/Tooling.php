<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tooling extends Model
{
  protected $table = 'tbl_tool';
  protected $primaryKey = 'tool_id';

  protected $rules = [
    'tool_name' => ['required'],
    'tool_active' => ['required']
  ];

}
