<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
    protected $table = 'fundraiser';
	protected $fillable = [
		'user_id',
		'campaign_id',
		'nominal',
		'url'
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
