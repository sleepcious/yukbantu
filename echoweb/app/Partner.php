<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partner';
	protected $fillable = [
		'name',
		'url',
		'no_telp',
		'website',
		'gambar',
		'biografi'
	];
}
