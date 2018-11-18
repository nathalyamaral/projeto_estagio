<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Supervisor
 * 
 * @property int $idSupervisor
 * @property int $empresa_cnpj
 * @property string $Users_cpf
 * @property string $Cargo
 * @property string $Area_Atuacao
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Empresa $empresa
 * @property \Illuminate\Database\Eloquent\Collection $arquivos
 * @property \Illuminate\Database\Eloquent\Collection $estagios
 * @property \Illuminate\Database\Eloquent\Collection $vagas
 *
 * @package App\Models
 */
class Supervisor extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'supervisor';
	public $incrementing = false;

	protected $casts = [
		'idSupervisor' => 'int',
		'empresa_cnpj' => 'int'
	];

	protected $fillable = [
		'Cargo',
		'Area_Atuacao'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'Users_cpf');
	}

	public function empresa()
	{
		return $this->belongsTo(\App\Models\Empresa::class, 'empresa_cnpj');
	}

	public function arquivos()
	{
		return $this->hasMany(\App\Models\Arquivo::class, 'Supervisor_idSupervisor');
	}

	public function estagios()
	{
		return $this->hasMany(\App\Models\Estagio::class, 'Supervisor_idSupervisor');
	}

	public function vagas()
	{
		return $this->hasMany(\App\Models\Vaga::class, 'Supervisor_idSupervisor');
	}
}
