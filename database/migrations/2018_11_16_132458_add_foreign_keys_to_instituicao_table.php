<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInstituicaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('instituicao', function(Blueprint $table)
		{
			$table->foreign('endereco_idendereco', 'fk_Instituicao_endereco1')->references('idendereco')->on('endereco')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('instituicao', function(Blueprint $table)
		{
			$table->dropForeign('fk_Instituicao_endereco1');
		});
	}

}
