<?php

use Illuminate\Database\Seeder;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;

class rolSeeder extends Seeder
{
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
    	DB::table('rol')->truncate();
    	DB::statement('SET FOREIGN_KEY_CHECKS=1');
        Rol::create(
        [
        	'id' => 1,
        	'name' => 'ADMIN',
        ]);

        Rol::create(
        [
        	'id' => 2,
        	'name' => 'COMPANY',
        ]);

        Rol::create(
        [
        	'id' => 3,
        	'name' => 'PERSON',
        ]);
    }
}
