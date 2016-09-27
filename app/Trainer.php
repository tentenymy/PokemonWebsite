<?php
/** 
 * @USC CSCI 577a HW02
 * @Author: Meiyi Yang
 * @Time: 09/23/2016
 * @Desc: Trainer Model
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    public function user() {
    	return $this->hasOne('App\User');
    }

    public function pokes() {
    	return $this->belongsToMany('App\Poke');
    }
}
