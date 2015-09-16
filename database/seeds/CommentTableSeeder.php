<?php 

use Illuminate\Database\Seeder;
use App\Comment; 
use App\User; 

class CommentTableSeeder extends Seeder {

    public function run() {
        DB::table('comments')->delete();
        Comment::create(array(
            'post_id' => 1, 
            'user_id' => User::where('name', 'Stan Marsh')->first()->id, 
            'text' => 'great news, dude' 
        )); 
        
        Comment::create(array(
            'post_id' => 1, 
            'user_id' => User::where('name', 'Kenny McCormick')->first()->id, 
            'text' => 'ifnkitizgutknewztoo'  
        )); 
        
  }

}