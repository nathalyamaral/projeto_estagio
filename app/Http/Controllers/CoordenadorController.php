<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Coordenador;
use App\Models\User;

class CoordenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Coordenador $aln)
    {
        $allCoordenador = $aln->all();
        return compact("allCoordenador");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ob =  $request->input('info');
        $coord = ['SIAPE'=> $ob['coordenador']['siap'], 'Cargo' => $ob['coordenador']['cargo'], "Users_cpf"=> $ob['cpf'], "curCampnome" => 'novo', "curNomeCur" => 'bacana'];
        return response()->json(Coordenador::inserir($coord));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
