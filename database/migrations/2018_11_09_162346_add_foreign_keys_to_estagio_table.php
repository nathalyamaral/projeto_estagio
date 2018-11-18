<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEstagioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('estagio', function(Blueprint $table)
		{
			$table->foreign('Aluno_rga', 'fk_estagio_Aluno1')->references('rga')->on('aluno')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('Supervisor_idSupervisor', 'fk_estagio_Supervisor1')->references('idSupervisor')->on('supervisor')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('estagio', function(Blueprint $table)
		{
			$table->dropForeign('fk_estagio_Aluno1');
			$table->dropForeign('fk_estagio_Supervisor1');
		});
	}

}
