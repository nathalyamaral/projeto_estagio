<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 20 Nov 2018 13:42:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Notification
 * 
 * @property int $id
 * @property string $type
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property string $data
 * @property \Carbon\Carbon $read_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Notification extends Eloquent
{
	protected $casts = [
		'notifiable_id' => 'int'
	];

	protected $dates = [
		'read_at'
	];

	protected $fillable = [
		'type',
		'notifiable_type',
		'notifiable_id',
		'data',
		'read_at'
	];
}
