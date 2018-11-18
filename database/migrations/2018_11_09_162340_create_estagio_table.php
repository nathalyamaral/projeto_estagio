<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstagioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estagio', function(Blueprint $table)
		{
			$table->integer('idestagio',true);
			$table->dateTime('data_inicio');
			$table->dateTime('data_fim');
			$table->enum('status', array('P','A','CA','CR'));
			$table->string('Aluno_rga', 20)->index('fk_estagio_Aluno1_idx');
			$table->integer('Supervisor_idSupervisor')->index('fk_estagio_Supervisor1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['idestagio','Aluno_rga','Supervisor_idSupervisor']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estagio');
	}

}
