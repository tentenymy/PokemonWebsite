<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poke extends Model
{
    public function trainers() {
    	return $this->hasMany('App\Trainer');
    }
}
