<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Instituicao::insert($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function show( $id,$variable)
    {
        return Instituicao::ler($id,$variable);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return Instituicao::alterar($id,$request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Instituicao::excluir($id);
    }
}
