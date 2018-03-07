<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StepMedia extends Model
{
  protected $table = 'step_media';
  protected $primaryKey = 'id';

  protected $rules = [
    'step_id' => ['required'],
    'media_id' => ['required'],
    'order' => ['required']
  ];

}
