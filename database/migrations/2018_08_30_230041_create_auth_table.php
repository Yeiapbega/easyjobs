<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('dni', 30)->unique()->nullable();
            $table->string('fsname', 200);            
            $table->string('flname', 100)->nullable();
            $table->string('slname', 100)->nullable();
            $table->string('email', 100)->nullable()->unique();
            $table->string('phone', 100)->default(0);
            $table->string('password', 100)->nullable();
            $table->string('dataPermission', 3);                             
            $table->string('photo', 200)->default("src/profile_photos/photo.png");
            $table->string('social_id', 40)->nullable()->unique();
            $table->string('provider', 50)->nullable();
            $table->string('dataComplete', 1)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('auth');
    }
}
