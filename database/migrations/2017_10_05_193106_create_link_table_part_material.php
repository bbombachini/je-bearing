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
        Schema::create('part_material', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->smallInteger('part_id');
            $table->smallInteger('material_id');
            $table->string('quantity', 100)->nullable();
            $table->string('size', 100)->nullable();
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
        Schema::dropIfExists('part_material');
    }
}
