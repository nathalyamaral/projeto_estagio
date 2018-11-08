<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlunoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aluno', function(Blueprint $table)
		{
			$table->string('rga', 20);
			$table->string('semestreAtual', 45);
			$table->string('Users_cpf', 45)->index('fk_Aluno_Users1_idx');
			$table->string('Curso_Campus_nome', 45);
			$table->string('Curso_nomeCurso', 45);
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['rga','Users_cpf']);
			$table->index(['Curso_Campus_nome','Curso_nomeCurso'], 'fk_Aluno_Curso1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aluno');
	}

}
