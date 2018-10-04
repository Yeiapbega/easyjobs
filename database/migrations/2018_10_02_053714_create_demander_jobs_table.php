<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemanderJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demander_jobs', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->unsignedInteger('id_job');
            $table->foreign('id_job')->references('id')->on('jobs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('dni_demander', 30);
            $table->foreign('dni_demander')->references('dni')->on('auth')->onDelete('cascade')->onUpdate('cascade'); 
            $table->date('demander_date');
            $table->string('state', 40)->default('WAITING_JOB');
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
        $table->dropForeign(['id_job']);
        $table->dropColumn('id_job');
        $table->dropForeign(['dni_demander']);
        $table->dropColumn('dni_demander');
        Schema::dropIfExists('demander_jobs');
    }
}
