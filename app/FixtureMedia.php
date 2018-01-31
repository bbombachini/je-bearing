<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FixtureMedia extends Model
{
  protected $table = 'fixture_media';
  protected $primaryKey = 'id';

  protected $rules = [
    'fixture_id' => ['required'],
    'media_id' => ['required'],
    'order' => ['required']
  ];

}
