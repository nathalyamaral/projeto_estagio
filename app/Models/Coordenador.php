<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Coordenador
 * 
 * @property int $SIAPE
 * @property string $Cargo
 * @property string $Users_cpf
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property string $curCampnome
 * @property string $curNomeCur
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Curso $curso
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
		'Cargo'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'Users_cpf');
	}

	public function curso()
	{
		return $this->belongsTo(\App\Models\Curso::class, 'curCampnome');
	}
}
