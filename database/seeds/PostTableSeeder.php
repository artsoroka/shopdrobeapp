<?php 

use Illuminate\Database\Seeder;
use App\User; 
use App\Post;

class PostTableSeeder extends Seeder {

    public function run() {
        DB::table('posts')->delete();
        Post::create(array(
            'user_id' => User::where('name', 'Eric Cartman')->first()->id,  
            'is_look' => false,
            'location_id' => 1, 
            'comment' => 'season 19 is comming soon'
        )); 

  }

}