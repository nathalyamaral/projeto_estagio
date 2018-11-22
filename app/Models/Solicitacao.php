<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 20 Nov 2018 13:16:24 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

use Illuminate\Http\Request;
/**
 * Class Solicitacao
 * 
 * @property int $idsolicitacao
 * @property string $razao
 * @property string $informacao
 *
 * @package App\Models
 */

class Solicitacao extends Eloquent
{
	protected $table = 'solicitacao';
	protected $primaryKey = 'idsolicitacao';
	public $timestamps = false;

	protected $fillable = [
		'razao',
		'informacao'
	];

	public static function inserir($request){
		$solicitacao = self::firstOrCreate(['informacao' => $request['informacao'] ], ['razao' => $request['razao'],'informacao' => $request['informacao']]);
		return [$solicitacao,200];
	}
	public static function ler($id){
		if ($id == null) {
			$solicitacoes=self::all();
			return $solicitacoes;
		}
		$solicitacao=self::find($id);
		return [$solicitacao, 200];
	}
	public static function excluir($id){
		if ($id != null) {
			$solicitacao = self::find($id);
		    if (!empty($solicitacao)) {
		    	if ($solicitacao->forcedelete()) {
		    		return ["Deletado com sucesso!",200];
		    	}
			}
		}
		return ["Ocorreu um problema, lamentamos o inconveniente.",403];
	}
}
