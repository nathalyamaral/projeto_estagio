<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresaHasEnderecoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresa_has_endereco', function(Blueprint $table)
		{
			$table->integer('empresa_cnpj')->index('fk_empresa_has_endereco_empresa1_idx');
			$table->integer('endereco_idendereco')->index('fk_empresa_has_endereco_endereco1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['empresa_cnpj','endereco_idendereco']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empresa_has_endereco');
	}

}
