<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    protected $table = 'verifikasi';
	protected $fillable = [
		'user_id',
		'id_card',
		'gambar',
		'no_telp',
		'facebook',
		'linkedin',
		'website',
		'instagram',
		'status'
	];
	
	public function pengguna()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}
}
