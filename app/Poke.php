<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poke extends Model
{
	protected $fillable = ['name'];
    public function trainers() {
    	return $this->hasMany('App\Trainer');
    }
}
