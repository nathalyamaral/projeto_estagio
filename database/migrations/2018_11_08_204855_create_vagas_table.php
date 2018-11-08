<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVagasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vagas', function(Blueprint $table)
		{
			$table->integer('idVagas');
			$table->string('Titulo', 45);
			$table->string('Area', 45);
			$table->text('Requisitos_para_Vaga', 65535);
			$table->integer('Supervisor_idSupervisor')->index('fk_Vagas_Supervisor1_idx');
			$table->enum('status', array('A','R','E'));
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['idVagas','Supervisor_idSupervisor']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vagas');
	}

}
