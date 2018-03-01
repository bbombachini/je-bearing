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

  public function tools() {
      return $this->belongsToMany('App\Tooling', 'part_tool', 'part_id', 'tool_id')->withTimestamps();;
  }

  public function fixtures() {
      return $this->belongsToMany('App\Fixture', 'part_fixture', 'part_id', 'fixture_id')->withTimestamps();;
  }

  public function materials() {
      return $this->belongsToMany('App\Material', 'part_material', 'part_id', 'material_id')->withTimestamps();;
  }

  public function operations() {
      return $this->belongsToMany('App\Operation', 'part_operation', 'part_id', 'operation_id')->withTimestamps();;
  }

  public function getToolingRelationship() {
    return $this->hasMany('App\PartTooling', 'part_id', 'id');
  }

  public function getFixtureRelationship() {
    return $this->hasMany('App\PartFixture', 'part_id', 'id');
  }

  public function getMaterialRelationship() {
    return $this->hasMany('App\PartMaterial', 'part_id', 'id');
  }

  public function getOperationRelationship() {
    return $this->hasMany('App\PartOperation', 'part_id', 'id');
  }
}
