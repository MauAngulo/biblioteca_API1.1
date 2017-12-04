<?php

use Illuminate\Database\Seeder;

class AccessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $access = 
        [
        	[
        		'id_file' => '1',
        		'id_user_types' => '2',
        	],
        	[
        		'id_file' => '2',
        		'id_user_types' => '2',
        	],
        	[
        		'id_file' => '2',
        		'id_user_types' => '3',
        	],
        	[
        		'id_file' => '2',
        		'id_user_types' => '4',
        	],
        	[
        		'id_file' => '3',
        		'id_user_types' => '2',
        	]
        ];

		DB::table('access')->insert($access);
    }
}
