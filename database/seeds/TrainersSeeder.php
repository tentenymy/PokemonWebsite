<?php
/** 
 * @USC CSCI 577a HW02
 * @Author: Meiyi Yang
 * @Time: 09/23/2016
 * @Desc: Run the Trainer seeds
 */

use Illuminate\Database\Seeder;

class TrainersSeeder extends Seeder {
    public function run() {
        DB::table('trainers')->delete();
        $trainers = array(
            ["id"=>1, "hometown"=>"Los Angeles", "user_id"=>1, "poke_id"=>1],
            ["id"=>2, "hometown"=>"Los Angeles", "user_id"=>2, "poke_id"=>2],
            ["id"=>3, "hometown"=>"Los Angeles", "user_id"=>3, "poke_id"=>3],
            ["id"=>4, "hometown"=>"Los Angeles", "user_id"=>4, "poke_id"=>2],
        );
        DB::table('trainers')->insert($trainers);
    }
}