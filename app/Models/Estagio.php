<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:50:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Estagio
 * 
 * @property int $idestagio
 * @property \Carbon\Carbon $data_inicio
 * @property \Carbon\Carbon $data_fim
 * @property string $status
 * @property string $Aluno_rga
 * @property int $Supervisor_idSupervisor
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Aluno $aluno
 * @property \App\Models\Supervisor $supervisor
 * @property \Illuminate\Database\Eloquent\Collection $frequencia
 *
 * @package App\Models
 */
class Estagio extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'estagio';
	public $incrementing = false;

	protected $casts = [
		'idestagio' => 'int',
		'Supervisor_idSupervisor' => 'int'
	];

	protected $dates = [
		'data_inicio',
		'data_fim'
	];

	protected $fillable = [
		'data_inicio',
		'data_fim',
		'status'
	];

	public function aluno()
	{
		return $this->belongsTo(\App\Models\Aluno::class, 'Aluno_rga');
	}

	public function supervisor()
	{
		return $this->belongsTo(\App\Models\Supervisor::class, 'Supervisor_idSupervisor');
	}

	public function frequencia()
	{
		return $this->hasMany(\App\Models\Frequencium::class, 'estagio_idestagio');
	}
}
