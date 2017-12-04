<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
        	[
        	'name' => 'Grado1',
        	'email' => 'email@email.org',
        	'password' => bcrypt('password'),
        	'user_type_id' => '2',
        	]
    	];

		DB::table('users')->insert($users);
    }
}
