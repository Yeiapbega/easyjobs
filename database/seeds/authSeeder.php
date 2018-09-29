<?php

use Illuminate\Database\Seeder;
use App\User;

class authSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
        [
        	'dni' => '123123',
        	'fname' => 'yeisson',
        	'sname' => 'andres',
        	'flname' => 'perez',
        	'slname' => 'begambre',
        	'email' => 'asdas@gmail.com',
        	'phone' => '2312312313',
        	'password' => bcrypt(123123),
        	'photo' => asset("src/profile_photos/photo.png"),
        	'remember_token' => str_random(64),
        	'rol_id' => DB::table('rol')
                           ->select('id')
                           ->where('id', 1)
                           ->value('id')
        ]);
    }
}
