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
			$table->string('rga', 20)->index('indiceRga_aluno');
			$table->string('semestreAtual', 45);
			$table->string('Users_cpf', 45)->index('fk_Aluno_Users1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->string('curso_Campus_nome', 45);
			$table->string('curso_nomeCurso', 45);
			$table->primary(['rga','Users_cpf','curso_Campus_nome','curso_nomeCurso']);
			$table->index(['curso_Campus_nome','curso_nomeCurso'], 'fk_aluno_curso1_idx');
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
