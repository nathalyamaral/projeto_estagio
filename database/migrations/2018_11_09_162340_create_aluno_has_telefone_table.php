<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlunoHasTelefoneTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aluno_has_telefone', function(Blueprint $table)
		{
			$table->string('Aluno_rga', 20)->index('fk_Aluno_has_telefone_Aluno1_idx');
			$table->string('telefone_telefone', 15)->index('fk_Aluno_has_telefone_telefone1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['Aluno_rga','telefone_telefone']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aluno_has_telefone');
	}

}
