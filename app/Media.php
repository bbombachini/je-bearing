<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
  protected $table = 'tbl_media';
  protected $primaryKey = 'media_id';

  protected $rules = [
    'media_path' => ['required'],
    'media_active' => ['required']
  ];

}
