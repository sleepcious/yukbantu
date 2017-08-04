<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambilsaku extends Model
{
    protected $table = 'ambilsaku';
	protected $fillable = [
		'user_id',
		'nominal',
		'nama_bank',
		'kantor_cabang',
		'atas_nama',
		'no_rek',
		'status'
	];
	
	public function pengguna()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}
}
