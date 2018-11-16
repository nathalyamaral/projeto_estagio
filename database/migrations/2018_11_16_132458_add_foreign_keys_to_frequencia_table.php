<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFrequenciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('frequencia', function(Blueprint $table)
		{
			$table->foreign('estagio_idestagio', 'fk_Frequencia_estagio1')->references('idestagio')->on('estagio')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('frequencia', function(Blueprint $table)
		{
			$table->dropForeign('fk_Frequencia_estagio1');
		});
	}

}
