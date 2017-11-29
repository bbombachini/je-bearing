<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTablePartStep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_part_step', function (Blueprint $table) {
            $table->increments('part_step_id');
            $table->smallInteger('part_id');
            $table->mediumInteger('step_id');
            $table->smallInteger('part_step_order');
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
        Schema::dropIfExists('tbl_part_step');
    }
}
