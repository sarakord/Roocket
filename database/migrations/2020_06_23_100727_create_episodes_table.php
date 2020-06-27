<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('title');
            $table->string('type');
            $table->text('description');
            $table->string('videoUrl');
            $table->string('tags');
            $table->integer('number');
            $table->string('time')->default('00:00:00');
            $table->integer('viewCount')->default(0);
            $table->integer('downloadCount')->default(0);
            $table->integer('commentCount')->default(0);
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

        Schema::dropIfExists('episodes');
    }
}
