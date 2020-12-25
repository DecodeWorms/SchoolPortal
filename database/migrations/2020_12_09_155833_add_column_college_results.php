<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCollegeResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('collegeResults',function(Blueprint $table){
            $table->decimal('mathematics');
            $table->decimal('physics');
            $table->decimal('chemistry');
            $table->decimal('biology');
            $table->decimal('technical_drawing');
            $table->decimal('english_language');
            $table->decimal('total');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
