<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAlunoHasEnderecoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('aluno_has_endereco', function(Blueprint $table)
		{
			$table->foreign('Aluno_rga', 'fk_Aluno_has_endereco_Aluno1')->references('rga')->on('aluno')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('endereco_idendereco', 'fk_Aluno_has_endereco_endereco1')->references('idendereco')->on('endereco')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('aluno_has_endereco', function(Blueprint $table)
		{
			$table->dropForeign('fk_Aluno_has_endereco_Aluno1');
			$table->dropForeign('fk_Aluno_has_endereco_endereco1');
		});
	}

}
