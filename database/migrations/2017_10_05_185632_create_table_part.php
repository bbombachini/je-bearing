<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_part', function (Blueprint $table) {
            $table->smallIncrements('part_id');
            $table->string('part_number', 50);
            $table->string('part_name', 200);
            $table->text('part_desc')->nullable();
            $table->boolean('part_active');
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
        Schema::dropIfExists('tbl_part');
    }
}
