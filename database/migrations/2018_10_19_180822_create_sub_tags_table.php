<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tags', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->unsignedInteger('tag');
            $table->String('name', 200);
            $table->foreign('tag')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');            
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
        Schema::dropIfExists('sub_tags');
    }
}
