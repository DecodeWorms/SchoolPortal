<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TertiaryStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tertiarys', function(Blueprint $table){
            $table->Increments('id');
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->string('email',35)->unique();
            $table->string('password');
            $table->string('gender',8);
            $table->integer('phone_number');
            $table->string('department',30);
            $table->binary('image');
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
        Schema::dropIfExists('tertiarys');
    }
}
