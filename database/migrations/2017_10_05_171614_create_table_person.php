<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_person', function (Blueprint $table) {
            $table->smallIncrements('person_id');
            $table->string('person_name', 100);
            $table->string('person_password', 100);
            $table->string('person_position', 150)->nullable();
            $table->smallInteger('person_team')->unsigned(); $table->foreign('person_team')->references('team_id')->on('tbl_team');
            $table->string('person_phone', 25);
            $table->string('person_email', 100);
            $table->string('person_photo', 150)->default('images/default.jpg');
            $table->boolean('person_active');
            $table->boolean('person_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_person');
    }
}
