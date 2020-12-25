<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TertiaryResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tertiaryResults',function(Blueprint $table){
            $table->Increments('id');
            $table->integer('tertiary_id')->unsigned();
            $table->foreign('tertiary_id')->references('id')->on('tertiarys');
            $table->integer('operating_system1');
            $table->integer('operating_system2');
            $table->integer('computer_architecture');
            $table->integer('mathematical_method');
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
        Schema::dropIfExists('tertiaryResults');
    }
}
