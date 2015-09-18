<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
            $table->string('url'); 
            $table->timestamps();
        });
        
        Schema::create('photo_post', function (Blueprint $table) {
            $table->integer('post_id')->unsigned(); 
            $table->integer('photo_id')->unsigned(); 
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
        Schema::dropIfExists('photo_post');
        Schema::dropIfExists('photos');
    }
}
