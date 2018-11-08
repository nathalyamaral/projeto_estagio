<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfiguracaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configuracao', function(Blueprint $table)
		{
			$table->integer('idconfiguracao');
			$table->integer('icone')->nullable();
			$table->integer('cores')->nullable();
			$table->integer('imagens')->nullable();
			$table->string('Users_cpf', 45)->index('fk_configuracao_Users1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['idconfiguracao','Users_cpf']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('configuracao');
	}

}
