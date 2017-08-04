<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';
	protected $fillable = [
		'nama',
		'posisi',
		'facebook',
		'instagram',
		'twitter',
		'google',
		'gambar'
	];
}
