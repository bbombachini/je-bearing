<?php

use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // tbl_person schema
    //  Schema::create('tbl_person', function (Blueprint $table) {
    //      $table->smallIncrements('person_id');
    //      $table->string('person_name', 100);
    //      $table->string('person_password', 100);
    //      $table->string('person_position', 150)->nullable();
    //      $table->smallInteger('person_team')->unsigned(); $table->foreign('person_team')->references('team_id')->on('tbl_team');
    //      $table->string('person_phone', 25);
    //      $table->string('person_email', 100);
    //      $table->string('person_photo', 150)->default('images/default.jpg');
    //      $table->boolean('person_active');
    //      $table->boolean('person_admin');
    //      $table->timestamps();
    //  });
    public function run()
    {
      $teams = DB::table('tbl_team')->select('team_id')->get();
      $teamsArray = [];
      foreach ($teams as $key=>$value) {
        array_push($teamsArray, $value->team_id);
      }

      DB::table('tbl_person')->insert([
        'person_name' => str_random(30),
        'person_password' => bcrypt('secret-password'),
        'person_position' => str_random(30),
        'person_team' => array_random($teamsArray),
        'person_phone' => str_random(20),
        'person_email' => str_random(30),
        'person_active' => 1,
        'person_admin' => 0,
        'created_at' => date('Y-m-d h:i:s', time()),
        'updated_at' => date('Y-m-d h:i:s', time()),
      ]);
    }
}
