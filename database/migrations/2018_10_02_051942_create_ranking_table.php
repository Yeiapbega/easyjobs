<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranking', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('demander', 30);
            $table->foreign('demander')->references('dni')->on('auth')->onDelete('cascade')->onUpdate('cascade');
            $table->string('offerter', 30);
            $table->foreign('offerter')->references('dni')->on('auth')->onDelete('cascade')->onUpdate('cascade');
            $table->float('amount', 8, 2);
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
        $table->dropForeign(['demander']);
        $table->dropColumn('demander');
        $table->dropForeign(['offerter']);
        $table->dropColumn('offerter');
        Schema::dropIfExists('ranking');
    }
}
