<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 20:50:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Frequencium
 * 
 * @property int $idFrequencia
 * @property \Carbon\Carbon $Data_inicio
 * @property \Carbon\Carbon $data_fim
 * @property string $Descricao_aluno
 * @property string $Descricao_Supervisor
 * @property string $status
 * @property int $estagio_idestagio
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Estagio $estagio
 *
 * @package App\Models
 */
class Frequencium extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $primaryKey = 'idFrequencia';

	protected $casts = [
		'estagio_idestagio' => 'int'
	];

	protected $dates = [
		'Data_inicio',
		'data_fim'
	];

	protected $fillable = [
		'Data_inicio',
		'data_fim',
		'Descricao_aluno',
		'Descricao_Supervisor',
		'status',
		'estagio_idestagio'
	];

	public function estagio()
	{
		return $this->belongsTo(\App\Models\Estagio::class, 'estagio_idestagio');
	}
}
