<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTableToolMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tool_media', function (Blueprint $table) {
            $table->increments('tool_media_id');
            $table->smallInteger('tool_id');
            $table->mediumInteger('media_id');
            $table->smallInteger('tool_media_order');
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
        Schema::dropIfExists('tbl_tool_media');
    }
}
