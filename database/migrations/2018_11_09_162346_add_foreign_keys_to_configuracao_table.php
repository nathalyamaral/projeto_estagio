<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConfiguracaoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('configuracao', function(Blueprint $table)
		{
			$table->foreign('Users_cpf', 'fk_configuracao_Users1')->references('cpf')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('configuracao', function(Blueprint $table)
		{
			$table->dropForeign('fk_configuracao_Users1');
		});
	}

}
