<?php

use Illuminate\Database\Seeder;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $files = [
	        [
	        	'upload_date' => '2017-06-13 00:17:03',
	        	'file_name' => 'proyectoSmallTourney.pdf',
	        	'avaliaility' => '0',
	        ],
	        [
	        	'upload_date' => '2017-11-02 18:57:23',
	        	'file_name' => 'Taller-PlanificaciÃ³nProgramaciÃ³n.pdf',
	        	'avaliaility' => '0',
	        ],
	        [
	        	'upload_date' => '2017-11-03 15:51:59',
	        	'file_name' => 'Angulo_Krauss_Garcia_Alvarez.pdf',
	        	'avaliaility' => '0',
	        ]
	    ];

	    DB::table('files')->insert($files);
    }
}
