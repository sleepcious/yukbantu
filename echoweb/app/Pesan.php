<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesan';
	protected $fillable = [
		'user_id',
		'campaign_id',
		'name',
		'email',
		'perihal',
		'isi'
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
