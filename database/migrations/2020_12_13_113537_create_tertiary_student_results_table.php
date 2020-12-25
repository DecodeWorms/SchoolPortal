<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTertiaryStudentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tertiary_student_results', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('tertiary_student_id')->unsigned();
            $table->foreign('tertiary_student_id')->references('id')->on('tertiary_students');
            $table->decimal('operating_system1');
            $table->decimal('operating_system2');
            $table->decimal('computer_architecture');
            $table->decimal('mathematical_method');
            $table->decimal('total');
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
        Schema::dropIfExists('tertiary_student_results');
    }
}
