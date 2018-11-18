<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAlunoHasTelefoneTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('aluno_has_telefone', function(Blueprint $table)
		{
			$table->foreign('Aluno_rga', 'fk_Aluno_has_telefone_Aluno1')->references('rga')->on('aluno')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('telefone_telefone', 'fk_Aluno_has_telefone_telefone1')->references('telefone')->on('telefone')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('aluno_has_telefone', function(Blueprint $table)
		{
			$table->dropForeign('fk_Aluno_has_telefone_Aluno1');
			$table->dropForeign('fk_Aluno_has_telefone_telefone1');
		});
	}

}
