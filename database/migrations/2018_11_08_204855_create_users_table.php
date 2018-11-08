<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->string('cpf', 45);
			$table->string('rg', 45);
			$table->string('nome', 45);
			$table->string('email', 45);
			$table->string('senha', 45);
			$table->integer('acesso_idacesso')->index('fk_Users_acesso1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->primary(['cpf','acesso_idacesso']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
