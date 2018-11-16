<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMensagemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mensagem', function(Blueprint $table)
		{
			$table->integer('idmensagem', true);
			$table->text('conteudo', 65535)->nullable();
			$table->string('Users_cpf', 45)->index('fk_mensagem_Users1_idx');
			$table->string('enviadoPara', 45);
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mensagem');
	}

}
