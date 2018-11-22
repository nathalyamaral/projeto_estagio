<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Campus
 * 
 * @property string $nome
 * @property string $diretor
 * @property string $emailDirecao
 * @property string $site
 * @property string $Instituicao_CNPJ
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Instituicao $instituicao
 * @property \Illuminate\Database\Eloquent\Collection $cursos
 * @property \Illuminate\Database\Eloquent\Collection $enderecos
 *
 * @package App\Models
 */
class Campus extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'campus';
	protected $primaryKey = 'nome';
	public $incrementing = false;

	protected $fillable = [
		'diretor',
		'emailDirecao',
		'site',
		'Instituicao_CNPJ'
	];

	public function instituicao()
	{
		return $this->belongsTo(\App\Models\Instituicao::class, 'Instituicao_CNPJ');
	}

	public function cursos()
	{
		return $this->hasMany(\App\Models\Curso::class, 'Campus_nome');
	}

	
	public function enderecos()
	{
		return $this->hasMany(\App\Models\Endereco::class, 'Campus_nome');
	}

	public static function inserir($request){
        $campus=self::firstOrCreate(['nome'=> $request['nome'] ],['nome'=> $request['nome'], 'diretor'=> $request['diretor'],'emailDirecao'=> $request['emailDirecao'], 'site' => $request['site'], 'Instituicao_CNPJ' =>['Instituicao_CNPJ'] ]);
        return 200;
	}
	public static function ler($id,$variable){
		if ($id == null) {
			return self::all();
		}
		if ($variable == null) {
			return self::all()->where('nome',$id);
		} else {
			return self::all()->where($id,$variable);
		}
}
