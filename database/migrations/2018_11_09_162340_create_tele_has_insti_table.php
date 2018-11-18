<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeleHasInstiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tele_has_insti', function(Blueprint $table)
		{
			$table->string('telefone_telefone', 15)->index('fk_tele_has_Insti_tele1_idx');
			$table->string('Instituicao_CNPJ', 45)->index('fk_tele_has_Insti_Insti1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['telefone_telefone','Instituicao_CNPJ']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tele_has_insti');
	}

}
