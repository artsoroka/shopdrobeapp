<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('post_id')->unsigned(); 
            $table->string('name'); 
            $table->timestamps();
        }); 
        
        Schema::table('brands', function($table) { 
            $table->foreign('post_id')->references('id')->on('posts'); 
        }); 
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('brands');
    }
}
