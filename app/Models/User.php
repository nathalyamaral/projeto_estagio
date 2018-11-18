<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Class User
 * 
 * @property string $cpf
 * @property string $rg
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property int $acesso_idacesso
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $alunos
 * @property \Illuminate\Database\Eloquent\Collection $configuracaos
 * @property \Illuminate\Database\Eloquent\Collection $coordenadors
 * @property \Illuminate\Database\Eloquent\Collection $mensagems
 * @property \Illuminate\Database\Eloquent\Collection $supervisors
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	public $incrementing = false;

	protected $casts = [
		'acesso_idacesso' => 'int'
	];

	protected $fillable = [
		'rg',
		'nome',
		'email',
		'senha'
	];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    	
	public function alunos()
	{
		return $this->hasMany(\App\Models\Aluno::class, 'Users_cpf');
	}

	public function configuracaos()
	{
		return $this->hasMany(\App\Models\Configuracao::class, 'Users_cpf');
	}

	public function coordenadors()
	{
		return $this->hasMany(\App\Models\Coordenador::class, 'Users_cpf');
	}

	public function mensagems()
	{
		return $this->hasMany(\App\Models\Mensagem::class, 'Users_cpf');
	}

	public function supervisors()
	{
		return $this->hasMany(\App\Models\Supervisor::class, 'Users_cpf');
	}
}
