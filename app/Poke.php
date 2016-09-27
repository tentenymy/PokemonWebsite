<?php
/** 
 * @USC CSCI 577a HW02
 * @Author: Meiyi Yang
 * @Time: 09/23/2016
 * @Desc: Poke Model
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Poke extends Model
{
    public function trainers() {
    	return $this->belongsToMany('App\Trainer');
    }
}