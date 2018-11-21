<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Curso
 * 
 * @property string $nomeCurso
 * @property string $Campus_nome
 * @property string $regulamentoEstagio
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Campus $campus
 * @property \Illuminate\Database\Eloquent\Collection $alunos
 * @property \Illuminate\Database\Eloquent\Collection $coordenadors
 *
 * @package App\Models
 */
class Curso extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'curso';
	protected $primaryKey = 'nome';
	public $incrementing = false;

	protected $fillable = [
		'regulamentoEstagio',
		'Campus_nome'
	];

	public function campus()
	{
		return $this->belongsTo(\App\Models\Campus::class, 'Campus_nome');
	}

	public function alunos()
	{
		return $this->hasMany(\App\Models\Aluno::class, 'curso_Campus_nome');
	}

	public function coordenadors()
	{
		return $this->hasMany(\App\Models\Coordenador::class, 'curCampnome');
	}

	public static function inserir($request){
        $curso=self::firstOrCreate(['nome'=> $request['nome'] ],['nome'=> $request['nome'], 'regulamentoEstagio'=> $request['regulamento'], 'Campus_nome' => $request['Campus_nome']]);
        return 200;
	}

}
