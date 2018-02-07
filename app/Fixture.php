<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
  protected $table = 'fixture';
  protected $primaryKey = 'id';

  protected $rules = [
    'name' => ['required'],
    'number' => ['required'],
    'active' => ['required']
  ];

  // Returns the first register of link table
  // This register provides the media_id that has to be selected on tbl_media
  public function getMediaRelationship() {
    return $this->hasOne('App\FixtureMedia', 'fixture_id', 'id');
  }

}
