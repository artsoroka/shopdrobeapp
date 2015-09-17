<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('looks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned(); 
            $table->string('frame'); 
            $table->string('text'); 
            $table->timestamps();
        });
        
        Schema::table('looks', function(Blueprint $table) { 
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
        Schema::drop('looks');
    }
}
