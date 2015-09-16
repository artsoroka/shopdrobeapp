<?php 

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();
        User::create(array(
            'name' => 'Eric Cartman', 
            'email' => 'eric.cartman@goredskins.com',
            'password' => Hash::make('123') 
        )); 
        
        User::create(array(
            'name' => 'Stan Marsh', 
            'email' => 'stan.marsh@goredskins.com',
            'password' => Hash::make('123') 
        )); 
        
                
        User::create(array(
            'name' => 'Kyle Broflovski', 
            'email' => 'kyle@goredskins.com',
            'password' => Hash::make('123') 
        )); 
        
        User::create(array(
            'name' => 'Kenny McCormick', 
            'email' => 'kenny@goredskins.com',
            'password' => Hash::make('123') 
        ));
        
    }

}