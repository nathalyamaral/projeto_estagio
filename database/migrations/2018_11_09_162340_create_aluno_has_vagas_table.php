<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlunoHasVagasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aluno_has_vagas', function(Blueprint $table)
		{
			$table->string('Aluno_rga', 20)->index('fk_Aluno_has_Vagas_Aluno1_idx');
			$table->integer('Vagas_idVagas')->index('fk_Aluno_has_Vagas_Vagas1_idx');
			$table->string('status', 45);
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['Aluno_rga','Vagas_idVagas']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aluno_has_vagas');
	}

}
