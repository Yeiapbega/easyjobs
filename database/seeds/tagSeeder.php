<?php

use Illuminate\Database\Seeder;
use App\Models\tag;
use Illuminate\Support\Facades\DB;

class tagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('tags')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');

		$vec = ['Tecnologia', 'Construcción', 'Plomeria', 'Diseño', 'Servicios varios', 'Administración'];
		for ($i=0; $i < sizeof($vec); $i++) 
		{
			tag::create(
			[
			  'id' => $i+1,
			  'name' => $vec[$i]
			]);
		}
    }
}
