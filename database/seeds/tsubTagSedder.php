<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use App\Models\subtag;

class tsubTagSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
		DB::table('sub_tags')->truncate();
		DB::statement('SET FOREIGN_KEY_CHECKS=1');

		$vecSub = ['pagina web', 'desarrollador', 'reparacion de camaras'];

		$vec = Tag::all();
		foreach($vec as $key => $value)
		{
			for ($i=0; $i < sizeof($vecSub); $i++) 
			{
				subTag::create(
				[				  
				  'tag' => $value->id,
				  'name' => $vecSub[$i]
				]);
			}			
		}
    }
}
