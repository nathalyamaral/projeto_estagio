<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:50:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Telefone
 * 
 * @property string $telefone
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $alunos
 * @property \Illuminate\Database\Eloquent\Collection $tele_has_instis
 * @property \Illuminate\Database\Eloquent\Collection $empresas
 *
 * @package App\Models
 */
class Telefone extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'telefone';
	protected $primaryKey = 'telefone';
	public $incrementing = false;

	public function alunos()
	{
		return $this->belongsToMany(\App\Models\Aluno::class, 'aluno_has_telefone', 'telefone_telefone', 'Aluno_rga')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function tele_has_instis()
	{
		return $this->hasMany(\App\Models\TeleHasInsti::class, 'telefone_telefone');
	}

	public function empresas()
	{
		return $this->belongsToMany(\App\Models\Empresa::class, 'telefone_has_empresa', 'telefone_telefone', 'empresa_cnpj')
					->withPivot('deleted_at')
					->withTimestamps();
	}
}
