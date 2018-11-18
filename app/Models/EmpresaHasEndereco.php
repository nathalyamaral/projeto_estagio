<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EmpresaHasEndereco
 * 
 * @property int $empresa_cnpj
 * @property int $endereco_idendereco
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Empresa $empresa
 * @property \App\Models\Endereco $endereco
 *
 * @package App\Models
 */
class EmpresaHasEndereco extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'empresa_has_endereco';
	public $incrementing = false;

	protected $casts = [
		'empresa_cnpj' => 'int',
		'endereco_idendereco' => 'int'
	];

	public function empresa()
	{
		return $this->belongsTo(\App\Models\Empresa::class, 'empresa_cnpj');
	}

	public function endereco()
	{
		return $this->belongsTo(\App\Models\Endereco::class, 'endereco_idendereco');
	}
}
