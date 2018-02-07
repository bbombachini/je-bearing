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
        Schema::create('person', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('fname', 50);
            $table->string('lname', 50);
            $table->string('password', 100);
            $table->string('position', 150)->nullable();
            $table->string('phone', 25);
            $table->string('email', 100);
            $table->string('photo', 150)->default('images/default.jpg');
            $table->boolean('active');
            $table->boolean('admin');
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
        Schema::dropIfExists('person');
    }
}
