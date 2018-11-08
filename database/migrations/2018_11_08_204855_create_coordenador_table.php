<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoordenadorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('coordenador', function(Blueprint $table)
		{
			$table->integer('SIAPE');
			$table->string('Cargo', 25);
			$table->string('Users_cpf', 45)->index('fk_Coordenador_Users1_idx');
			$table->string('Curso_Campus_nome', 45);
			$table->string('Curso_nomeCurso', 45);
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['SIAPE','Users_cpf']);
			$table->index(['Curso_Campus_nome','Curso_nomeCurso'], 'fk_Coordenador_Curso1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coordenador');
	}

}
