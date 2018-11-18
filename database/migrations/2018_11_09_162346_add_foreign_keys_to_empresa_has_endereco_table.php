<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEmpresaHasEnderecoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('empresa_has_endereco', function(Blueprint $table)
		{
			$table->foreign('empresa_cnpj', 'fk_empresa_has_endereco_empresa1')->references('cnpj')->on('empresa')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('endereco_idendereco', 'fk_empresa_has_endereco_endereco1')->references('idendereco')->on('endereco')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('empresa_has_endereco', function(Blueprint $table)
		{
			$table->dropForeign('fk_empresa_has_endereco_empresa1');
			$table->dropForeign('fk_empresa_has_endereco_endereco1');
		});
	}

}
