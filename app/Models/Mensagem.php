<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Mensagem
 * 
 * @property int $idmensagem
 * @property string $conteudo
 * @property string $Users_cpf
 * @property string $enviadoPara
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Mensagem extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'mensagem';
	protected $primaryKey = 'idmensagem';

	protected $fillable = [
		'conteudo',
		'Users_cpf',
		'enviadoPara'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'Users_cpf');
	}
}
