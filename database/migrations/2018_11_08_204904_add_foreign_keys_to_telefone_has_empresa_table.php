<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTelefoneHasEmpresaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('telefone_has_empresa', function(Blueprint $table)
		{
			$table->foreign('empresa_cnpj', 'fk_telefone_has_empresa_empresa1')->references('cnpj')->on('empresa')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('telefone_telefone', 'fk_telefone_has_empresa_telefone1')->references('telefone')->on('telefone')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('telefone_has_empresa', function(Blueprint $table)
		{
			$table->dropForeign('fk_telefone_has_empresa_empresa1');
			$table->dropForeign('fk_telefone_has_empresa_telefone1');
		});
	}

}
