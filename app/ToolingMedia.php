<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToolingMedia extends Model
{
  protected $table = 'tool_media';
  protected $primaryKey = 'id';

  protected $rules = [
    'tool_id' => ['required'],
    'media_id' => ['required'],
    'order' => ['required']
  ];

}
