<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campus', function(Blueprint $table)
		{
			$table->string('nome', 45)->primary();
			$table->string('diretor', 45);
			$table->string('emailDirecao', 45);
			$table->string('site', 45);
			$table->string('Instituicao_CNPJ', 45)->index('fk_Campus_Instituicao1_idx');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campus');
	}

}
