<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartMaterial extends Model
{
  protected $table = 'part_material';
  protected $primaryKey = 'id';

  protected $rules = [
    'part_id' => ['required'],
    'material_id' => ['required']
  ];

}
