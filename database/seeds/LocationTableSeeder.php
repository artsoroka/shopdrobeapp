<?php 

use Illuminate\Database\Seeder;
use App\Location; 

class LocationTableSeeder extends Seeder {

    public function run() {
        DB::table('locations')->delete();
        Location::create(array(
            'title' => 'New York', 
            'lat' => '40.730610', 
            'lng' => '-73.935242' 
        )); 

  }

}