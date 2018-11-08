<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArquivoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('arquivo', function(Blueprint $table)
		{
			$table->foreign('Aluno_rga', 'fk_Arquivo_Aluno1')->references('rga')->on('aluno')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('Supervisor_idSupervisor', 'fk_Arquivo_Supervisor1')->references('idSupervisor')->on('supervisor')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('arquivo', function(Blueprint $table)
		{
			$table->dropForeign('fk_Arquivo_Aluno1');
			$table->dropForeign('fk_Arquivo_Supervisor1');
		});
	}

}
