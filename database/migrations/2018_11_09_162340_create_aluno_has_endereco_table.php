<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlunoHasEnderecoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aluno_has_endereco', function(Blueprint $table)
		{
			$table->string('Aluno_rga', 20)->index('fk_Aluno_has_endereco_Aluno1_idx');
			$table->integer('endereco_idendereco')->index('fk_Aluno_has_endereco_endereco1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['Aluno_rga','endereco_idendereco']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aluno_has_endereco');
	}

}
