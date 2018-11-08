<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCursoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('curso', function(Blueprint $table)
		{
			$table->foreign('Campus_nome', 'fk_Curso_Campus1')->references('nome')->on('campus')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('curso', function(Blueprint $table)
		{
			$table->dropForeign('fk_Curso_Campus1');
		});
	}

}
