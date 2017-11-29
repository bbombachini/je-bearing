<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTableNoteMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_note_media', function (Blueprint $table) {
            $table->increments('note_media_id');
            $table->mediumInteger('note_id');
            $table->mediumInteger('media_id');
            $table->smallInteger('note_media_order');
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
        Schema::dropIfExists('tbl_note_media');
    }
}
