<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup', function (Blueprint $table) {
          $table->smallIncrements('id');
          $table->string('title', 200);
          $table->string('number', 50)->nullable();
          $table->text('desc')->nullable();
          $table->boolean('active');
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
        Schema::dropIfExists('setup');
    }
}
