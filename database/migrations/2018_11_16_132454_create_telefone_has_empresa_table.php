<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTelefoneHasEmpresaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('telefone_has_empresa', function(Blueprint $table)
		{
			$table->string('telefone_telefone', 15)->index('fk_tele_has_empr_tele1_idx');
			$table->integer('empresa_cnpj')->index('fk_tele_has_empr_empr1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['telefone_telefone','empresa_cnpj']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('telefone_has_empresa');
	}

}
