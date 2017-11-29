<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTableFixtureMedia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fixture_media', function (Blueprint $table) {
            $table->increments('fixture_media_id');
            $table->smallInteger('fixture_id');
            $table->mediumInteger('media_id');
            $table->smallInteger('fixture_media_order');
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
        Schema::dropIfExists('tbl_fixture_media');
    }
}
