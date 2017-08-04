<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignUpdate extends Model
{
    protected $table = 'campaign_update';
	protected $fillable = [
		'user_id',
		'campaign_id',
		'judul',
		'detail',
		'gambar'
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
