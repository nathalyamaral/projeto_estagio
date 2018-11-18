<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AlunoHasEndereco
 * 
 * @property string $Aluno_rga
 * @property int $endereco_idendereco
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Aluno $aluno
 * @property \App\Models\Endereco $endereco
 *
 * @package App\Models
 */
class AlunoHasEndereco extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'aluno_has_endereco';
	public $incrementing = false;

	protected $casts = [
		'endereco_idendereco' => 'int'
	];

	public function aluno()
	{
		return $this->belongsTo(\App\Models\Aluno::class, 'Aluno_rga');
	}

	public function endereco()
	{
		return $this->belongsTo(\App\Models\Endereco::class, 'endereco_idendereco');
	}
}
