<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
  protected $table = 'part';
  protected $primaryKey = 'id';

  protected $rules = [
    'name' => ['required'],
    'number' => ['required'],
    'active' => ['required']
  ];

  public function getToolingRelationship() {
    return $this->hasMany('App\PartTooling', 'part_id', 'id');
  }
}
