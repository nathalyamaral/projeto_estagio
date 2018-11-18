<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSupervisorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('supervisor', function(Blueprint $table)
		{
			$table->foreign('Users_cpf', 'fk_Supervisor_Users1')->references('cpf')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('empresa_cnpj', 'fk_Supervisor_empresa1')->references('cnpj')->on('empresa')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('supervisor', function(Blueprint $table)
		{
			$table->dropForeign('fk_Supervisor_Users1');
			$table->dropForeign('fk_Supervisor_empresa1');
		});
	}

}
