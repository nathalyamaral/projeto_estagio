<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:50:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Acesso
 * 
 * @property int $idacesso
 * @property string $nivel
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Acesso extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'acesso';
	protected $primaryKey = 'idacesso';

	protected $fillable = [
		'nivel'
	];

	public function users()
	{
		return $this->hasMany(\App\Models\User::class, 'acesso_idacesso');
	}
}
