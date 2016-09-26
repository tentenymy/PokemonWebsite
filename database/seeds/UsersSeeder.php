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
        DB::table('users')->delete();
        $users = array(
            ["id"=>1, "name"=>"Nurse Joy", "email"=>"nursejoy@usc.edu", "password"=>bcrypt("123456"), "isAdmin"=>true, "remember_token"=>"", "created_at"=>new DateTime, "updated_at"=>new DateTime],
            ["id"=>2, "name"=>"Professor Oak", "email"=>"professoroak@usc.edu", "password"=>bcrypt("123456"), "isAdmin"=>true, "remember_token"=>"", "created_at"=>new DateTime, "updated_at"=>new DateTime],
            ["id"=>3, "name"=>"Meiyi Yang", "email"=>"meiyiyan@usc.edu", "password"=>bcrypt("123456"), "isAdmin"=>false, "remember_token"=>"", "created_at"=>new DateTime, "updated_at"=>new DateTime],
            ["id"=>4, "name"=>"Maggie Yang", "email"=>"meiyiyan2@usc.edu", "password"=>bcrypt("123456"), "isAdmin"=>false, "remember_token"=>"", "created_at"=>new DateTime, "updated_at"=>new DateTime],
        );
        DB::table('users')->insert($users);
    }
}