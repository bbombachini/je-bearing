<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTablePartMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_part_material', function (Blueprint $table) {
            $table->mediumIncrements('part_material_id');
            $table->smallInteger('part_id');
            $table->smallInteger('material_id');
            $table->string('part_material_quantity', 100)->nullable();
            $table->string('part_material_size', 100)->nullable();
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
        Schema::dropIfExists('tbl_part_material');
    }
}
