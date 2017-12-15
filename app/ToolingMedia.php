<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToolingMedia extends Model
{
  protected $table = 'tbl_tool_media';
  protected $primaryKey = 'tool_media_id';

  protected $rules = [
    'tool_id' => ['required'],
    'media_id' => ['required'],
    'tool_media_order' => ['required']
  ];

}
