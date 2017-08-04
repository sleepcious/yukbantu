<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
	protected $fillable = [
		'user_id',
		'email',
		'campaign_id',
		'komentar'
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
