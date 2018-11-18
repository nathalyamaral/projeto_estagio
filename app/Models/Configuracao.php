<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Configuracao
 * 
 * @property int $idconfiguracao
 * @property int $icone
 * @property int $cores
 * @property int $imagens
 * @property string $Users_cpf
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Configuracao extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'configuracao';
	public $incrementing = false;

	protected $casts = [
		'idconfiguracao' => 'int',
		'icone' => 'int',
		'cores' => 'int',
		'imagens' => 'int'
	];

	protected $fillable = [
		'icone',
		'cores',
		'imagens'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'Users_cpf');
	}
}
