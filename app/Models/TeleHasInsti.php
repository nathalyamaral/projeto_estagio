<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TeleHasInsti
 * 
 * @property string $telefone_telefone
 * @property string $Instituicao_CNPJ
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Instituicao $instituicao
 * @property \App\Models\Telefone $telefone
 *
 * @package App\Models
 */
class TeleHasInsti extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'tele_has_insti';
	public $incrementing = false;

	public function instituicao()
	{
		return $this->belongsTo(\App\Models\Instituicao::class, 'Instituicao_CNPJ');
	}

	public function telefone()
	{
		return $this->belongsTo(\App\Models\Telefone::class, 'telefone_telefone');
	}
}
