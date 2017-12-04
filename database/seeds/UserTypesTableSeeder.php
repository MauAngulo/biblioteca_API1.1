<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_types = [
        	[
        		'id' => '1',
        		'user_type' => 'admin',
        	],
        	[
        		'id' => '2',
        		'user_type' => 'grado1',
        	],
        	[
        		'id' => '3',
        		'user_type' => 'grado2',
        	],
        	[
        		'id' => '4',
        		'user_type' => 'grado3',
        	]
        ];

        DB::table('user_types')->insert($user_types);
    }
}
