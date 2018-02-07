<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialMedia extends Model
{
  protected $table = 'material_media';
  protected $primaryKey = 'id';

  protected $rules = [
    'material_id' => ['required'],
    'media_id' => ['required'],
    'order' => ['required']
  ];

}
