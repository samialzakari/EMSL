<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->unsignedBigInteger('fm_id');
            $table->foreign('fm_id')->references('id')->on('users');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
        });

        Schema::create('section_student',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('student_id');
            $table->integer('mark')->nullable();
            $table->timestamps();

            $table->unique(['section_id','student_id']);

            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
