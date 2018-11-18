<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupervisorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supervisor', function(Blueprint $table)
		{
			$table->integer('idSupervisor',true);
			$table->integer('empresa_cnpj')->index('fk_Supervisor_empresa1_idx');
			$table->string('Users_cpf', 45)->index('fk_Supervisor_Users1_idx');
			$table->string('Cargo', 45);
			$table->string('Area_Atuacao', 45);
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['idSupervisor','empresa_cnpj','Users_cpf']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('supervisor');
	}

}
