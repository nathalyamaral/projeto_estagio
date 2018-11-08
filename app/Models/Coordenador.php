<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:50:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Coordenador
 * 
 * @property int $SIAPE
 * @property string $Cargo
 * @property string $Users_cpf
 * @property string $Curso_Campus_nome
 * @property string $Curso_nomeCurso
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Curso $curso
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Coordenador extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'coordenador';
	public $incrementing = false;

	protected $casts = [
		'SIAPE' => 'int'
	];

	protected $fillable = [
		'Cargo',
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
}
