<?php 

use Illuminate\Database\Seeder;
use App\Brand;

class BrandTableSeeder extends Seeder {

    public function run() {
        DB::table('brands')->delete();
        
        Brand::create(array(
            'post_id' => 1,  
            'name' => 'Comedy Central'
        )); 
        
        Brand::create(array(
            'post_id' => 1,  
            'name' => 'Netflix'
        )); 
        
    }

}