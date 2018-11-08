<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArquivoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arquivo', function(Blueprint $table)
		{
			$table->integer('idArquivo', true);
			$table->enum('tipo_arquivo', array('TC','PA','RFA','RFS'));
			$table->string('arquivo', 150);
			$table->string('Aluno_rga', 20)->index('fk_Arquivo_Aluno1_idx');
			$table->integer('Supervisor_idSupervisor')->nullable()->index('fk_Arquivo_Supervisor1_idx');
			$table->enum('status', array('A','P'))->nullable();
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
		Schema::drop('arquivo');
	}

}
