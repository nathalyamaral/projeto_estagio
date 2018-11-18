<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMensagemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mensagem', function(Blueprint $table)
		{
			$table->foreign('Users_cpf', 'fk_mensagem_Users1')->references('cpf')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mensagem', function(Blueprint $table)
		{
			$table->dropForeign('fk_mensagem_Users1');
		});
	}

}
