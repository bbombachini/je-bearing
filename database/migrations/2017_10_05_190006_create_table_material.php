<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_material', function (Blueprint $table) {
            $table->smallIncrements('material_id');
            $table->string('material_name', 150);
            $table->text('material_desc')->nullable();
            $table->string('material_location', 255)->nullable();
            $table->boolean('material_active');
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
        Schema::dropIfExists('tbl_material');
    }
}
