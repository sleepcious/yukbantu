<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';
	protected $fillable = [
		'meta_name',
		'pages_id',
		'url',
		'gambar',
		'konten'
	];
	
	public function halaman()
	{
		return $this->hasOne('App\Pages', 'id', 'pages_id');
	}
}
