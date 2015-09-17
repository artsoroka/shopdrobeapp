<?php 

use Illuminate\Database\Seeder;
use App\Look; 

class LookTableSeeder extends Seeder {

    public function run() {
        DB::table('looks')->delete();
        Look::create(array(
            'post_id' => 1,
            'frame' => '{{121, 121,1}, {30, 30}}', 
            'text' => 'some point on photo'
        )); 

  }

}