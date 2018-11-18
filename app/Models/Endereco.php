<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Endereco
 * 
 * @property int $idendereco
 * @property string $rua
 * @property string $numero
 * @property string $cidade
 * @property string $cep
 * @property string $estado
 * @property string $complemento
 * @property string $Campus_nome
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Campus $campus
 * @property \Illuminate\Database\Eloquent\Collection $alunos
 * @property \Illuminate\Database\Eloquent\Collection $empresas
 * @property \Illuminate\Database\Eloquent\Collection $instituicaos
 *
 * @package App\Models
 */
class Endereco extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'endereco';
	protected $primaryKey = 'idendereco';

	protected $fillable = [
		'rua',
		'numero',
		'cidade',
		'cep',
		'estado',
		'complemento',
		'Campus_nome'
	];

	public function campus()
	{
		return $this->belongsTo(\App\Models\Campus::class, 'Campus_nome');
	}

	public function alunos()
	{
		return $this->belongsToMany(\App\Models\Aluno::class, 'aluno_has_endereco', 'endereco_idendereco', 'Aluno_rga')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function empresas()
	{
		return $this->belongsToMany(\App\Models\Empresa::class, 'empresa_has_endereco', 'endereco_idendereco', 'empresa_cnpj')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function instituicaos()
	{
		return $this->hasMany(\App\Models\Instituicao::class, 'endereco_idendereco');
	}
}
