<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTableQualityNote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_quality_note', function (Blueprint $table) {
            $table->increments('quality_note_id');
            $table->mediumInteger('quality_id');
            $table->mediumInteger('note_id');
            $table->smallInteger('quality_note_order');
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
        Schema::dropIfExists('tbl_quality_note');
    }
}
