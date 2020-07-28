<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
           // $table->foreignId('user_id')->constrained()->onDelete('cascade');;//ifwe delete user, will be delete their posts
            $table->string('title');
            $table->text('post_image')->nullable();
            $table->text('body');
            $table->timestamps();

            //foreign keys
          $table->foreign('user_id')
          ->references('id')
          ->on('users')
          ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
