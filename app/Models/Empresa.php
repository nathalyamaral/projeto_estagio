<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

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
		'nome',
		'nome_representante',
		'ramo'
	];

	public function enderecos()
	{
		return $this->belongsToMany(\App\Models\Endereco::class, 'empresa_has_endereco', 'empresa_cnpj', 'endereco_idendereco')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function supervisors()
	{
		return $this->hasMany(\App\Models\Supervisor::class, 'empresa_cnpj');
	}

	public function telefones()
	{
		return $this->belongsToMany(\App\Models\Telefone::class, 'telefone_has_empresa', 'empresa_cnpj', 'telefone_telefone')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
