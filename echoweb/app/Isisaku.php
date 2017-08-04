<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Isisaku extends Model
{
    protected $table = 'isisaku';
	protected $fillable = [
		'user_id',
		'nominal',
		'payment_id',
		'kode_unik',
		'status'
	];
	
	public function pengguna()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}
	public function pembayaran()
	{
		return $this->hasOne('App\Payment', 'id', 'payment_id');
	}
}
