<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:50:27 +0000.
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
}