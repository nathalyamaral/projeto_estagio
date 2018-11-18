<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVagasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vagas', function(Blueprint $table)
		{
			$table->foreign('Supervisor_idSupervisor', 'fk_Vagas_Supervisor1')->references('idSupervisor')->on('supervisor')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vagas', function(Blueprint $table)
		{
			$table->dropForeign('fk_Vagas_Supervisor1');
		});
	}

}
