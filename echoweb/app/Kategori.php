<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
	protected $fillable = [
		'name',
		'url'
	];
	
	public function kampanye()
    {
        return $this->hasMany('App\Campaign');
    }
}
