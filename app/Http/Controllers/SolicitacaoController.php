<?php

namespace App\Http\Controllers;

use App\Models\Solicitacao;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitacao=Solicitacao::inserir($request);
        if ($solicitacao == null) {
            return response('deu ruim',405);     
         } 
        return response($solicitacao);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        $solicitacao=Solicitacao::ler($id);
        return response($solicitacao);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitacao  $solicitacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solicitacao=Solicitacao::excluir($id);
        return response($solicitacao);
    }
}
