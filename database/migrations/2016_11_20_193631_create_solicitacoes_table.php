<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacoes',  function (Blueprint $table) {
            $table->increments('idSolicitacao');
            $table->string('user_cpf');
            $table->text('descSolicitacao');
            $table->timestamps();
            $table->softDeletes();
            $table->primary('idSolicitacao');
        });

        Schema::create('user_has_solicitacoes',  function (Blueprint $table) {
            $table->increments('idSolicitacao');
            $table->string('Aluno_rga', 45);
            $table->timestamps();
        });

        Schema::table('user_has_solicitacoes', function(Blueprint $table) {
            $table->foreign('Aluno_rga')->references('cpf')->on('users');
            $table->foreign('idSolicitacao')->references('id')->on('solicitacoes');
        });

        Schema::table('solicitacoes', function(Blueprint $table) {
            $table->foreign('Aluno_rga')->references('cpf')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitacoes');
        Schema::dropIfExists('user_has_solicitacoes');

    }
}
