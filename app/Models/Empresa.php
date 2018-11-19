<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:06:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use App\Models\Endereco;
use App\Models\Telefone;
use App\Models\EmpresaHasEndereco as HasE;
use App\Models\TelefoneHasEmpresa as HasT;

/**
 * Class Empresa
 * 
 * @property int $cnpj
 * @property string $nome
 * @property string $nome_representante
 * @property string $ramo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $enderecos
 * @property \Illuminate\Database\Eloquent\Collection $supervisors
 * @property \Illuminate\Database\Eloquent\Collection $telefones
 *
 * @package App\Models
 */
class Empresa extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'empresa';
	protected $primaryKey = 'cnpj';
	public $incrementing = false;

	protected $casts = [
		'cnpj' => 'int'
	];

	protected $fillable = [
		'cnpj',
		'nome',
		'nome_representante',
		'ramo'
	];

	private function enderecos()
	{
		return $this->belongsToMany(\App\Models\Endereco::class, 'empresa_has_endereco', 'empresa_cnpj', 'endereco_idendereco')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function supervisors()
	{
		return $this->hasMany(\App\Models\Supervisor::class, 'empresa_cnpj');
	}

	private function telefones()
	{
		return $this->belongsToMany(\App\Models\Telefone::class, 'telefone_has_empresa', 'empresa_cnpj', 'telefone_telefone')
					->withPivot('deleted_at')
					->withTimestamps();
	}
	
	private static function restaura(Empresa $em, $request){
		$em = self::withTrashed()->find($request['cnpj']);
        if ((!empty($em) and $em->trashed())) {
        	$em->restore();
			$hasTel= HasT::all()->where('empresa_cnpj',$request['cnpj']);
	        $te=Telefone::withTrashed()->find($request['telefone']);
	        $te->restore();
	        $hasE= HasE::withTrashed()->find($request['cnpj']);
	        foreach ($hasE as $end) {
	        	$en=Endereco::withTrashed()->find($end['endereco_idendereco']);
		        $en->restore();
			}
		}
		// return self::alterar($cnpj,['nome'=>$nome,'nome_representante'=>$nome_representante,'ramo'=>$ramo,'endereco'=>['rua' => $rua,'numero'=>$numero,'cidade'=>$numero,'cidade'=>$cidade,'cep'=>$cep,'estado'=>$estado,'complemento'=>$complemento], 'telefone'=>['telefone_telefone'=>$telefon]]); 
	}

	public static function inserir($request){
        $idempresa=self::firstOrCreate(['cnpj'=> $request['cnpj'] ],['cnpj'=> $request['cnpj'], 'nome'=> $request['nome'],'nome_representante'=> $request['nome_representante'],'ramo'=> $request['ramo'] ]);
        foreach ($request['endereco'] as $end) {
			$endereco = new Endereco();
	        $idendereco= $endereco->insert($end['rua'],$end['numero'],$end['cidade'],$end['cep'],$end['estado'],$end['complemento']);        	
		    $hasEnd = new HasE();
	        $teste2=$hasEnd::all()->where('endereco_idendereco',$idendereco['idendereco'])->where('empresa_cnpj',$request['cnpj'])->count();
	        if ($teste2 == 0){
	        	$hasEnd->endereco()->associate($idendereco);
	        	$hasEnd->empresa()->associate($idempresa);
	        	$hasEnd->save();
	        }
        }
        foreach ($request['telefone'] as $tel) {
        	$telefone = new Telefone();
	        $idtelefone=$telefone->insert($tel['telefone_telefone']);
		    $hasTel = new HasT();
	        $teste=$hasTel::all()->where('telefone_telefone', $idtelefone['telefone'])->where('empresa_cnpj',$request['cnpj'])->count(); 
	        if ($teste == 0){
	        	$hasTel->telefone()->associate($idtelefone);
		        $hasTel->empresa()->associate($idempresa);
		        $hasTel->save();
	        }
        }
        return 200;
	}
	public static function ler($id,$variable){
		if ($variable == null) {
			$empresaOne = self::all()->where('cnpj',$id);
		} else {
			$empresaOne = self::all()->where($id,$variable);
		}
		if (empty($empresaOne[0])) {
			return $empresaOne;
		}
        $hasTel= HasT::all()->where('empresa_cnpj',$empresaOne[0]->cnpj);
		$hasEnd= HasE::all()->where('empresa_cnpj',$empresaOne[0]->cnpj);
        $telefone=array();
        foreach ($hasTel as $tel) {
            array_push($telefone, $tel);
        }
        $endereco=array();
        foreach ($hasEnd as $end) {
            $ende = Endereco::find($end->endereco_idendereco);
            array_push($endereco, $ende);
        }
        $empresaOne[0]->telefone=$telefone;
        $empresaOne[0]->endereco=$endereco;
        return $empresaOne;
	}
	public static function alterar($id, $request){
		$empresaOne = self::find($id);
		if (!($empresaOne->nome == $request['nome'])) {
			$empresaOne->nome = $request['nome'];
		}
		if (!($empresaOne->nome_representante == $request['nome_representante'])) {
			$empresaOne->nome_representante = $request['nome_representante'];
		}
		if (!($empresaOne->ramo == $request['ramo'])) {
			$empresaOne->ramo = $request['ramo'];
		}
		$hasEnd= HasE::all()->where('empresa_cnpj',$id);
        foreach ($request['endereco'] as $end) {
            $ende = Endereco::find($end['idendereco']);
          	if (!($ende->rua == $end['rua'])) {
          		$ende->rua = $end['rua'];
			}
          	if (!($ende->numero == $end['numero'])) {
          		$ende->numero = $end['numero'];
			}			
          	if (!($ende->cidade == $end['cidade'])) {
          		$ende->cidade = $end['cidade'];
			}        
          	if (!($ende->cep == $end['cep'])) {
          		$ende->cep = $end['cep'];
			}
          	if (!($ende->estado == $end['estado'])) {
          		$ende->estado = $end['estado'];
			}			
          	if (!($ende->complemento == $end['complemento'])) {
          		$ende->complemento = $end['complemento'];
			}
			$ende->save();
		}
		// $hasTel= HasT::all()->where('empresa_cnpj',$id);
        // foreach ($request['telefone'] as $teste => $tel) {
            // if (!($hasTel[$teste]['telefone_telefone'] == $tel['telefone_telefone'])) {

				// $telefone=Telefone::find($hasTel[$teste]['telefone_telefone']);
				// $telefone->update(['telefone' => $tel['telefone_telefone'] ]);
				// return ['n'=>$hasTel[$teste]['telefone_telefone'],'u'=>$telefone, 't'=>($hasTel[$teste]['telefone_telefone'] == $tel['telefone_telefone']),'t1'=>$hasTel[$teste]['telefone_telefone'],'t2'=>$tel['telefone_telefone']];
			// }			/**/
        /*}*/
		return 200;
	}
	public static function excluir($id){
		$empresaOne = self::find($id);
	    if (!empty($empresaOne)) {
			$hasEnd= HasE::all()->where('empresa_cnpj',$id);
			$hasTel= HasT::all()->where('empresa_cnpj',$id);
	    	foreach ($hasEnd as $end) {
	            $ende = Endereco::find($end['endereco_idendereco']);
	            $ende->forcedelete();
			}
	        foreach ($hasTel as $tel) {
				$telefone=Telefone::find($tel['telefone_telefone']);
				$telefone->forcedelete();
	        }
	        if($empresaOne->forcedelete()){
	        	return 200;
	        }else{
	        	return 405;
	        }
	    }
	}
}
