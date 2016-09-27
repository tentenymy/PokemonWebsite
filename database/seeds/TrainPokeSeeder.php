<?php
/** 
 * @USC CSCI 577a HW02
 * @Author: Meiyi Yang
 * @Time: 09/23/2016
 * @Desc: Run the Trainer seeds
 */

use Illuminate\Database\Seeder;

class TrainerPokeSeeder extends Seeder {
    public function run() {
        DB::table('poke_trainer')->delete();
        $poke_trainer = array(
            ["id"=>1, "poke_id"=>1, "trainer_id"=>1],
            ["id"=>2, "poke_id"=>1, "trainer_id"=>2],
            ["id"=>3, "poke_id"=>1, "trainer_id"=>3],
            ["id"=>4, "poke_id"=>2, "trainer_id"=>1],
            ["id"=>5, "poke_id"=>3, "trainer_id"=>1],
            ["id"=>6, "poke_id"=>4, "trainer_id"=>1],
        );
        DB::table('poke_trainer')->insert($poke_trainer);
    }
}