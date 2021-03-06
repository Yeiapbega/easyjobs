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
        	'dni' => '12341234',
        	'fsname' => 'Yeisson',
        	'flname' => 'Perez',
        	'slname' => 'Begambre',
        	'email' => 'asda1s@gmail.com',
        	'phone' => '2312312313',
        	'password' => bcrypt(12345),
        	'photo' => "src/profile_photos/photo.png",
        	'remember_token' => str_random(64),
            'dataPermission' => 'YES',
            'dataComplete' => '1',
            'ApiToken' => str_random(64),
        	'rol_id' => DB::table('rol')
                           ->select('id')
                           ->where('id', 1)
                           ->value('id')
        ]);

        User::create(
        [
        	'dni' => '12345678',
        	'fsname' => 'Adrian',
        	'flname' => 'Correa',
        	'slname' => 'Mass',
        	'email' => 'asd2as@gmail.com',
        	'phone' => '23123113',
            'dataComplete' => '1',
        	'password' => bcrypt(12345),
        	'photo' => "src/profile_photos/photo.png",
        	'remember_token' => str_random(64),
            'dataPermission' => 'YES',
            'ApiToken' => str_random(64),
        	'rol_id' => DB::table('rol')
                           ->select('id')
                           ->where('id', 2)
                           ->value('id')
        ]);

        User::create(
        [
        	'dni' => '123456789',
        	'fsname' => 'Miguel',
        	'flname' => 'viloria',
        	'slname' => 'sierra',
        	'email' => 'asda3s@gmail.com',
        	'phone' => '23312313',
        	'password' => bcrypt(12345),
        	'photo' => "src/profile_photos/photo.png",
        	'remember_token' => str_random(64),
            'dataPermission' => 'YES',
            'dataComplete' => '1',
            'ApiToken' => str_random(64),
        	'rol_id' => DB::table('rol')
                           ->select('id')
                           ->where('id', 3)
                           ->value('id')
        ]);

        User::create(
        [
        	'dni' => '1234567890',
        	'fsname' => 'Rene',
        	'flname' => 'vilora',
        	'slname' => 'Sierra',
        	'email' => 'asda4s@gmail.com',
        	'phone' => '2362312313',
        	'password' => bcrypt(12345),
        	'photo' => "src/profile_photos/photo.png",
        	'remember_token' => str_random(64),
            'dataPermission' => 'YES',
            'dataComplete' => '1',
            'ApiToken' => str_random(64),
        	'rol_id' => DB::table('rol')
                           ->select('id')
                           ->where('id', 4)
                           ->value('id')
        ]);
    }
}
