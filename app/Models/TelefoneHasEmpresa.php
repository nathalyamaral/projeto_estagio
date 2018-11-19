<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:06:17 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TelefoneHasEmpresa
 * 
 * @property string $telefone_telefone
 * @property int $empresa_cnpj
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Empresa $empresa
 * @property \App\Models\Telefone $telefone
 *
 * @package App\Models
 */
class TelefoneHasEmpresa extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'telefone_has_empresa';
	public $incrementing = false;

	protected $casts = [
		'empresa_cnpj' => 'int'
	];

	public function empresa()
	{
		return $this->belongsTo(\App\Models\Empresa::class, 'empresa_cnpj');
	}

	public function telefone()
	{
		return $this->belongsTo(\App\Models\Telefone::class, 'telefone_telefone');
	}
}
