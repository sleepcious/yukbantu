<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
	protected $fillable = [
		'name',
		'rekening',
		'nominal',
		'cabang',
		'atas_nama'
	];
}
