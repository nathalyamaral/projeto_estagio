<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCursoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('curso', function(Blueprint $table)
		{
			$table->string('nomeCurso', 45);
			$table->string('Campus_nome', 45)->index('fk_Curso_Campus1_idx');
			$table->text('regulamentoEstagio', 65535);
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['Campus_nome','nomeCurso']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('curso');
	}

}
