<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAccessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('access', function(Blueprint $table)
		{
			$table->foreign('id_file', 'FK_access_files')->references('id')->on('files')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('id_access', 'FK_access_user_types')->references('id')->on('user_types')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('access', function(Blueprint $table)
		{
			$table->dropForeign('FK_access_files');
			$table->dropForeign('FK_access_user_types');
		});
	}

}
