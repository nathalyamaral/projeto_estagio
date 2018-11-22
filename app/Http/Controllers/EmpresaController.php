<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Endereco;
use App\Models\Telefone;
use App\Models\EmpresaHasEndereco as HasE;
use App\Models\TelefoneHasEmpresa as HasT;


class EmpresaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa=Empresa::inserir($request->all());
        return response()->json($empresa);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$variable)
    {
        $empresa = Empresa::ler($id,$variable);
        return response()->json($empresa); 
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
            $empresaOne=Empresa::alterar($id,$request->all());
            return response()->json($empresaOne);       
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
            $empresaOne = Empresa::excluir($id);
            return response()->json($empresaOne);
        }else{
            return '401';
        }
    }
}
