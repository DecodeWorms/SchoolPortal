<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CollegesResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collegeResults',function(Blueprint $table){
            $table->Increments('id');
            $table->integer('college_id')->unsigned();
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->integer('mathematics');
            $table->integer('physics');
            $table->integer('chemistry');
            $table->integer('biology');
            $table->integer('technical_drawing');
            $table->integer('english_language');
            $table->float('total');
            $table->string('status');
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
        Schema::dropIfExists('collegeResults');
    }
}
