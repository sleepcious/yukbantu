<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaign';
	protected $fillable = [
		'user_id',
		'judul',
		'target_dana',
		'link_campaign',
		'deadline',
		'kategori_id',
		'lokasi',
		'gambar',
		'video',
		'short_desc',
		'long_desc',
		'status'
	];
	
	public function pengguna()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}
	public function kelompok()
	{
		return $this->hasOne('App\Kategori', 'id', 'kategori_id');
	}
}
