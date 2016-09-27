<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poke extends Model
{
	protected $table = 'pokes';
    public function trainers() {
    	return $this->hasMany('App\Trainer');
    }
}