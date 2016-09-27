<?php
/** 
 * @USC CSCI 577a HW02
 * @Author: Meiyi Yang
 * @Time: 09/23/2016
 * @Desc: Run the Pokemons seeds
 */

use Illuminate\Database\Seeder;

class PokesSeeder extends Seeder {
    public function run() {
    	DB::table('pokes')->delete();
    	$pokes = array(
    		["id"=>1, "name"=>"Bulbasaur"],
    		["id"=>2, "name"=>"Ivysaur"],
    		["id"=>3, "name"=>"Venusaur"],
    		["id"=>4, "name"=>"Charmander"],
    		["id"=>5, "name"=>"Charmeleon"],
    	);
    	DB::table('pokes')->insert($pokes);
    }
}