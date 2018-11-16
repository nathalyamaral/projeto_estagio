<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCampusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('campus', function(Blueprint $table)
		{
			$table->foreign('Instituicao_CNPJ', 'fk_Campus_Instituicao1')->references('CNPJ')->on('instituicao')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('campus', function(Blueprint $table)
		{
			$table->dropForeign('fk_Campus_Instituicao1');
		});
	}

}
