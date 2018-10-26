<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(rolSeeder::class);
      $this->call(authSeeder::class);
      $this->call(TagsSeeder::class);
    }
}
