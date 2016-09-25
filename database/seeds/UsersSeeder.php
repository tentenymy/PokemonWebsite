<?php
/** 
 * @USC CSCI 577a HW02
 * @Author: Meiyi Yang
 * @Time: 09/23/2016
 * @Desc: Run the Trainer seeds
 */

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {
    public function run() {
        /*DB::table('users')->delete();
        $users = array(
            ["id"=>1, "name"=>"Meiyi Yang", "email"=>"meiyiyan@usc.edu", "password"=>"123456", "admin"=>true, "remember_token"=>"", "created_at"=>new DateTime, "updated_at"=>new DateTime],
            ["id"=>2, "name"=>"Meiyi Yang2", "email"=>"meiyiyan2@usc.edu", "password"=>"123456", "admin"=>false, "remember_token"=>"", "created_at"=>new DateTime, "updated_at"=>new DateTime],
            ["id"=>3, "name"=>"Meiyi Yang3", "email"=>"meiyiyan3@usc.edu", "password"=>"123456", "admin"=>false, "remember_token"=>"", "created_at"=>new DateTime, "updated_at"=>new DateTime],
            ["id"=>4, "name"=>"Meiyi Yang4", "email"=>"meiyiyan4@usc.edu", "password"=>"123456", "admin"=>false, "remember_token"=>"", "created_at"=>new DateTime, "updated_at"=>new DateTime],
        );*/
        //DB::table('users')->insert($users);
    }
}