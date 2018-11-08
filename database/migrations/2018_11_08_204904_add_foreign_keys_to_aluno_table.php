<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAlunoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('aluno', function(Blueprint $table)
		{
			$table->foreign('Curso_Campus_nome', 'fk_Aluno_Curso1')->references('Campus_nome')->on('curso')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('Users_cpf', 'fk_Aluno_Users1')->references('cpf')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('aluno', function(Blueprint $table)
		{
			$table->dropForeign('fk_Aluno_Curso1');
			$table->dropForeign('fk_Aluno_Users1');
		});
	}

}
