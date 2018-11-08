<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:50:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Arquivo
 * 
 * @property int $idArquivo
 * @property string $tipo_arquivo
 * @property string $arquivo
 * @property string $Aluno_rga
 * @property int $Supervisor_idSupervisor
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Aluno $aluno
 * @property \App\Models\Supervisor $supervisor
 *
 * @package App\Models
 */
class Arquivo extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'arquivo';
	protected $primaryKey = 'idArquivo';

	protected $casts = [
		'Supervisor_idSupervisor' => 'int'
	];

	protected $fillable = [
		'tipo_arquivo',
		'arquivo',
		'Aluno_rga',
		'Supervisor_idSupervisor',
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
}
