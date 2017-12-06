<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
  protected $table = 'tbl_fixture';
  protected $primaryKey = 'fixture_id';

  protected $rules = [
    'fixture_name' => ['required'],
    'fixture_active' => ['required']
  ];

}
