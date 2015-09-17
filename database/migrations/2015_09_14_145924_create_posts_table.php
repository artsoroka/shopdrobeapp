<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->text('comment');
            $table->boolean('is_look'); 
            $table->boolean('poll'); 
            $table->boolean('bought_status'); 
            $table->timestamps();
        });
        
        Schema::table('posts', function($table) { 
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('location_id')->references('id')->on('locations'); 
        }); 
                
        Schema::table('photos', function($table) { 
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
        Schema::drop('photos'); 
        Schema::drop('posts');
    }
}
