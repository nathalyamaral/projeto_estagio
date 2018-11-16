<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTeleHasInstiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tele_has_insti', function(Blueprint $table)
		{
			$table->foreign('Instituicao_CNPJ', 'fk_tele_has_Insti_Insti1')->references('CNPJ')->on('instituicao')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('telefone_telefone', 'fk_tele_has_Insti_tele1')->references('telefone')->on('telefone')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tele_has_insti', function(Blueprint $table)
		{
			$table->dropForeign('fk_tele_has_Insti_Insti1');
			$table->dropForeign('fk_tele_has_Insti_tele1');
		});
	}

}
