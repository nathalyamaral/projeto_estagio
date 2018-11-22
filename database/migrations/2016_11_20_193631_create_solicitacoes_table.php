<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitacoesTable extends Migration
{

     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitacoes');
        Schema::dropIfExists('users_has_solicitacoes');

    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacoes',  function (Blueprint $table) {
            $table->increments('id');
            $table->string('users_cpf', 45);
            $table->text('descSolicitacao');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('solicitacoes', function(Blueprint $table) {
            $table->foreign('users_cpf')->references('cpf')->on('users');
        });

        Schema::create('users_has_solicitacoes',  function (Blueprint $table) {
            $table->increments('solicitacoes_idSolicitacao');
            $table->string('users_cpf', 45);
            $table->timestamps();
        });

        Schema::table('users_has_solicitacoes', function(Blueprint $table) {
            $table->foreign('users_cpf')->references('cpf')->on('users');
            $table->foreign('solicitacoes_idSolicitacao')->references('id')->on('solicitacoes');
        });

    }

   
}
