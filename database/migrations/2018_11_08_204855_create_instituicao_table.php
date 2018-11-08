<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstituicaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instituicao', function(Blueprint $table)
		{
			$table->string('CNPJ', 45);
			$table->string('Razao_Social', 45);
			$table->string('email', 45);
			$table->string('site', 45);
			$table->enum('tipoEnsino', array('Pub','Priv'));
			$table->integer('endereco_idendereco')->index('fk_Instituicao_endereco1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['CNPJ','endereco_idendereco']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instituicao');
	}

}
