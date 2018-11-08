<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:50:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AlunoHasTelefone
 * 
 * @property string $Aluno_rga
 * @property string $telefone_telefone
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Aluno $aluno
 * @property \App\Models\Telefone $telefone
 *
 * @package App\Models
 */
class AlunoHasTelefone extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'aluno_has_telefone';
	public $incrementing = false;

	public function aluno()
	{
		return $this->belongsTo(\App\Models\Aluno::class, 'Aluno_rga');
	}

	public function telefone()
	{
		return $this->belongsTo(\App\Models\Telefone::class, 'telefone_telefone');
	}
}
