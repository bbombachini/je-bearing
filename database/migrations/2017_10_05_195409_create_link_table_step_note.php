<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTableStepNote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_step_note', function (Blueprint $table) {
            $table->increments('step_note_id');
            $table->mediumInteger('step_id');
            $table->mediumInteger('note_id');
            $table->smallInteger('step_note_order');
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
        Schema::dropIfExists('tbl_step_note');
    }
}
