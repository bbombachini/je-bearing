<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_comment', function (Blueprint $table) {
            $table->mediumIncrements('comment_id');
            $table->string('comment_title', 255)->nullable();
            $table->text('comment_desc');
            $table->smallInteger('comment_person')->unsigned(); $table->foreign('comment_person')->references('person_id')->on('tbl_person');
            $table->boolean('comment_active');
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
        Schema::dropIfExists('tbl_comment');
    }
}
