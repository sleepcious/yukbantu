<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonasiOffline extends Model
{
    protected $table = 'offline_donasi';
	protected $fillable = [
		'campaign_id',
		'nominal',
		'name',
		'email',
		'no_telp',
		'currency'
	];
	
	public function pengguna()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}
	public function kampanye()
	{
		return $this->hasOne('App\Campaign', 'id', 'campaign_id');
	}
}
