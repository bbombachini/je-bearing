<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tooling extends Model
{
  protected $table = 'tbl_tool';
  protected $primaryKey = 'tool_id';

  protected $rules = [
    'tool_name' => ['required'],
    'tool_active' => ['required']
  ];

    // public function __construct() {
    //   $this->table = 'tbl_tool';
    // }
    //
  // public function getAll() {
  //   $results = DB::select('SELECT * FROM '.$this->table.' ORDER BY tool_name ASC');
  //   return $results;
  // }

}
