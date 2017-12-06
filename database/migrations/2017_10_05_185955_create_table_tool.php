<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tool', function (Blueprint $table) {
            $table->smallIncrements('tool_id');
            $table->string('tool_name', 100);
            $table->string('tool_number', 50)->nullable();
            $table->text('tool_desc')->nullable();
            $table->boolean('tool_active');
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
        Schema::dropIfExists('tbl_tool');
    }
}
