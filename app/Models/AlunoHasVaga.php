<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:50:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AlunoHasVaga
 * 
 * @property string $Aluno_rga
 * @property int $Vagas_idVagas
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Aluno $aluno
 * @property \App\Models\Vaga $vaga
 *
 * @package App\Models
 */
class AlunoHasVaga extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public $incrementing = false;

	protected $casts = [
		'Vagas_idVagas' => 'int'
	];

	protected $fillable = [
		'status'
	];

	public function aluno()
	{
		return $this->belongsTo(\App\Models\Aluno::class, 'Aluno_rga');
	}

	public function vaga()
	{
		return $this->belongsTo(\App\Models\Vaga::class, 'Vagas_idVagas');
	}
}
