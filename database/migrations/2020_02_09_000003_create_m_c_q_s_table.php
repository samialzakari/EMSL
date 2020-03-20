<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCQSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_c_q_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text ('question');
            $table->integer('chapter_no');
            $table->integer('mark');
            $table->text('correct_answer');
            $table->text('option1');
            $table->text('option2')->nullable();
            $table->text('option3')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_c_q_s');
    }
}
