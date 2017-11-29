<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFixture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fixture', function (Blueprint $table) {
            $table->smallIncrements('fixture_id');
            $table->string('fixture_name', 100);
            $table->text('fixture_desc')->nullable();
            $table->boolean('fixture_active');
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
        Schema::dropIfExists('tbl_fixture');
    }
}
