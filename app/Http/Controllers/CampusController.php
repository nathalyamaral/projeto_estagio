<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campus;
use App\Models\Instituicao;
use App\Models\Endereco;


class CampusController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campus=Campus::inserir($request->all());
        return response()->json($campus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$variable)
    {
        $campusOne = Campus::ler($id,$variable);
        return response()->json($campusOne);
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
        if ($id != null) {
            $campusOne=Campus::alterar($id,$request->all());
            return response()->json($campusOne);       
        }else{
            return '401';
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id != null) {
            $campusOne = Campus::excluir($id);
            return response()->json($campusOne);;       
        }else{
            return '401';
        }
    }
}