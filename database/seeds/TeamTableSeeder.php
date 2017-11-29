<?php

use Illuminate\Database\Seeder;

date_default_timezone_set('America/Toronto');

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //
        DB::table('tbl_team')->insert([
          'team_name' => str_random(20),
          'team_desc' => str_random(50),
          'team_active' => 1,
          'created_at' => date('Y-m-d h:i:s', time()),
          'updated_at' => date('Y-m-d h:i:s', time()),
        ]);
    }


}
