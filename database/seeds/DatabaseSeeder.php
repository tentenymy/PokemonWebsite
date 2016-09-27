<?php
/** 
 * @USC CSCI 577a HW02
 * @Author: Meiyi Yang
 * @Time: 09/23/2016
 * @Desc: Add database seeder
 */

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('PokesSeeder');
        $this->call('UsersSeeder');
        $this->call('TrainersSeeder');
        $this->call('TrainerPokeSeeder');
    }
}
