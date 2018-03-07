<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartFixture extends Model
{
  protected $table = 'part_fixture';
  protected $primaryKey = 'id';

  protected $rules = [
    'part_id' => ['required'],
    'fixture_id' => ['required']
  ];

}
