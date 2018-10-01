<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('title', 100);
            $table->text('description');
            $table->string('images', 100)->default(asset("src/textures/job_defaults.png"));
            $table->integer('hours');
            $table->integer('pay');
            $table->string('offerter', 30);
            $table->foreign('offerter')->references('dni')->on('auth')->onDelete('cascade')->onUpdate('cascade'); 
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['dni_offerter']);
        $table->dropColumn('dni_offerter');
        Schema::dropIfExists('jobs');
    }
}
