<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table){
            
            $table->string('slug');
            $table->string('titleGame');
            $table->longText('description');
            $table->string('categorie');
            $table->string('downloadLink');
            $table->string('image_path');
            $table->timestamps();
            $table->unsignedBigInteger('user_ID');
            $table->foreign('user_ID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
