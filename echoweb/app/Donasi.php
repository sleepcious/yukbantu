<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Donasi extends Model
{
	use Notifiable;
	
    protected $table = 'donasi';
	protected $fillable = [
		'user_id',
		'campaign_id',
		'nominal',
		'name',
		'email',
		'no_telp',
		'payment_id',
		'kode_unik',
		'currency',
		'status'
	];
	
	public function pengguna()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}
	public function kampanye()
	{
		return $this->hasOne('App\Campaign', 'id', 'campaign_id');
	}
	public function pembayaran()
	{
		return $this->hasOne('App\Payment', 'id', 'payment_id');
	}
	// public function penggalang()
	// {
		// return $this->hasOne('App\Fundraiser', 'id', 'fundraiser_id');
	// }
	public function routeNotificationForMail()
    {
        return $this->email;
    }
}
