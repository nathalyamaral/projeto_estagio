<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnderecoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('endereco', function(Blueprint $table)
		{
			$table->integer('idendereco', true);
			$table->string('rua', 45);
			$table->string('numero', 45);
			$table->string('cidade', 45);
			$table->string('cep', 45);
			$table->string('estado', 45);
			$table->string('complemento', 45)->nullable();
			$table->string('Campus_nome', 45)->nullable()->index('fk_endereco_Campus1_idx');
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
		Schema::drop('endereco');
	}

}
