<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:50:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Vaga
 * 
 * @property int $idVagas
 * @property string $Titulo
 * @property string $Area
 * @property string $Requisitos_para_Vaga
 * @property int $Supervisor_idSupervisor
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Supervisor $supervisor
 * @property \Illuminate\Database\Eloquent\Collection $alunos
 *
 * @package App\Models
 */
class Vaga extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public $incrementing = false;

	protected $casts = [
		'idVagas' => 'int',
		'Supervisor_idSupervisor' => 'int'
	];

	protected $fillable = [
		'Titulo',
		'Area',
		'Requisitos_para_Vaga',
		'status'
	];

	public function supervisor()
	{
		return $this->belongsTo(\App\Models\Supervisor::class, 'Supervisor_idSupervisor');
	}

	public function alunos()
	{
		return $this->belongsToMany(\App\Models\Aluno::class, 'aluno_has_vagas', 'Vagas_idVagas', 'Aluno_rga')
					->withPivot('status', 'deleted_at')
					->withTimestamps();
	}
}
