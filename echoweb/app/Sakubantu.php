<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sakubantu extends Model
{
    protected $table = 'sakubantu';
	protected $fillable = [
		'user_id',
		'debet',
		'kredit',
		'currency'
	];
	
	public function pengguna()
	{
		return $this->hasOne('App\User', 'id', 'user_id');
	}
}
