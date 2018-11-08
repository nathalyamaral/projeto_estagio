<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:50:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Aluno
 * 
 * @property string $rga
 * @property string $semestreAtual
 * @property string $Users_cpf
 * @property string $Curso_Campus_nome
 * @property string $Curso_nomeCurso
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Curso $curso
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $enderecos
 * @property \Illuminate\Database\Eloquent\Collection $telefones
 * @property \Illuminate\Database\Eloquent\Collection $vagas
 * @property \Illuminate\Database\Eloquent\Collection $arquivos
 * @property \Illuminate\Database\Eloquent\Collection $estagios
 *
 * @package App\Models
 */
class Aluno extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'aluno';
	public $incrementing = false;

	protected $fillable = [
		'semestreAtual',
		'Curso_Campus_nome',
		'Curso_nomeCurso'
	];

	public function curso()
	{
		return $this->belongsTo(\App\Models\Curso::class, 'Curso_Campus_nome');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'Users_cpf');
	}

	public function enderecos()
	{
		return $this->belongsToMany(\App\Models\Endereco::class, 'aluno_has_endereco', 'Aluno_rga', 'endereco_idendereco')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function telefones()
	{
		return $this->belongsToMany(\App\Models\Telefone::class, 'aluno_has_telefone', 'Aluno_rga', 'telefone_telefone')
					->withPivot('deleted_at')
					->withTimestamps();
	}

	public function vagas()
	{
		return $this->belongsToMany(\App\Models\Vaga::class, 'aluno_has_vagas', 'Aluno_rga', 'Vagas_idVagas')
					->withPivot('status', 'deleted_at')
					->withTimestamps();
	}

	public function arquivos()
	{
		return $this->hasMany(\App\Models\Arquivo::class, 'Aluno_rga');
	}

	public function estagios()
	{
		return $this->hasMany(\App\Models\Estagio::class, 'Aluno_rga');
	}
}
