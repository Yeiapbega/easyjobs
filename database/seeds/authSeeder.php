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
    	DB::statement('SET FOREIGN_KEY_CHECKS=0');
    	DB::table('auth')->truncate();
    	DB::statement('SET FOREIGN_KEY_CHECKS=1');

        User::create(
        [
        	'dni' => '1234',
        	'fname' => 'Yeisson',
        	'sname' => 'Andres',
        	'flname' => 'Perez',
        	'slname' => 'Begambre',
        	'email' => 'asdas@gmail.com',
        	'phone' => '2312312313',
        	'password' => bcrypt(1234),
        	'photo' => asset("src/profile_photos/photo.png"),
        	'remember_token' => str_random(64),
            'dataPermission' => 'YES',
        	'rol_id' => DB::table('rol')
                           ->select('id')
                           ->where('id', 1)
                           ->value('id')
        ]);

        User::create(
        [
        	'dni' => '12345',
        	'fname' => 'Adrian',
        	'sname' => 'David',
        	'flname' => 'Correa',
        	'slname' => 'Mass',
        	'email' => 'asdas@gmail.com',
        	'phone' => '2312312313',
        	'password' => bcrypt(12345),
        	'photo' => asset("src/profile_photos/photo.png"),
        	'remember_token' => str_random(64),
            'dataPermission' => 'YES',
        	'rol_id' => DB::table('rol')
                           ->select('id')
                           ->where('id', 2)
                           ->value('id')
        ]);

        User::create(
        [
        	'dni' => '123456',
        	'fname' => 'Miguel',
        	'sname' => 'angel',
        	'flname' => 'viloria',
        	'slname' => 'sierra',
        	'email' => 'asdas@gmail.com',
        	'phone' => '2312312313',
        	'password' => bcrypt(123456),
        	'photo' => asset("src/profile_photos/photo.png"),
        	'remember_token' => str_random(64),
            'dataPermission' => 'YES',
        	'rol_id' => DB::table('rol')
                           ->select('id')
                           ->where('id', 3)
                           ->value('id')
        ]);

        User::create(
        [
        	'dni' => '1234567',
        	'fname' => 'Rene',
        	'sname' => 'orlando',
        	'flname' => 'vilora',
        	'slname' => 'Sierra',
        	'email' => 'asdas@gmail.com',
        	'phone' => '2312312313',
        	'password' => bcrypt(1234567),
        	'photo' => asset("src/profile_photos/photo.png"),
        	'remember_token' => str_random(64),
            'dataPermission' => 'YES',
        	'rol_id' => DB::table('rol')
                           ->select('id')
                           ->where('id', 4)
                           ->value('id')
        ]);
    }
}
