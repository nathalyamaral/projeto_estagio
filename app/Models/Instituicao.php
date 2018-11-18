<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Nov 2018 16:25:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Instituicao
 * 
 * @property string $CNPJ
 * @property string $Razao_Social
 * @property string $email
 * @property string $site
 * @property string $tipoEnsino
 * @property int $endereco_idendereco
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Endereco $endereco
 * @property \Illuminate\Database\Eloquent\Collection $campuses
 * @property \Illuminate\Database\Eloquent\Collection $tele_has_instis
 *
 * @package App\Models
 */
class Instituicao extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'instituicao';
	public $incrementing = false;

	protected $casts = [
		'endereco_idendereco' => 'int'
	];

	protected $fillable = [
		'Razao_Social',
		'email',
		'site',
		'tipoEnsino'
	];

	public function endereco()
	{
		return $this->belongsTo(\App\Models\Endereco::class, 'endereco_idendereco');
	}

	public function campuses()
	{
		return $this->hasMany(\App\Models\Campus::class, 'Instituicao_CNPJ');
	}

	public function tele_has_instis()
	{
		return $this->hasMany(\App\Models\TeleHasInsti::class, 'Instituicao_CNPJ');
	}
}
