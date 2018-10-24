<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tag');
            $table->string('job');
            $table->foreign('tag')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('job')->references('token')->on('jobs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['tag','job']);
        Schema::dropIfExists('tag_jobs');
    }
}
