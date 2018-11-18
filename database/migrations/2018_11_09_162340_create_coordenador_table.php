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
			$table->timestamps();
			$table->softDeletes();
			$table->string('curCampnome', 45);
			$table->string('curNomeCur', 45);
			$table->primary(['SIAPE','Users_cpf','curCampnome','curNomeCur']);
			$table->index(['curCampnome','curNomeCur'], 'fk_coordenador_curso1_idx');
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
