<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
            $table->timestamps();
        });
        
        Schema::create('post_tag', function($table) { 
            $table->integer('post_id')->unsigned(); 
            $table->integer('tag_id')->unsigned(); 
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hash_tags');
    }
}
