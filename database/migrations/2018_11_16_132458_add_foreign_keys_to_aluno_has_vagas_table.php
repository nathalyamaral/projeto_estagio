<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAlunoHasVagasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('aluno_has_vagas', function(Blueprint $table)
		{
			$table->foreign('Aluno_rga', 'fk_Aluno_has_Vagas_Aluno1')->references('rga')->on('aluno')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('Vagas_idVagas', 'fk_Aluno_has_Vagas_Vagas1')->references('idVagas')->on('vagas')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('aluno_has_vagas', function(Blueprint $table)
		{
			$table->dropForeign('fk_Aluno_has_Vagas_Aluno1');
			$table->dropForeign('fk_Aluno_has_Vagas_Vagas1');
		});
	}

}
