<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_user', function (Blueprint $table) {
            $table->primary(['user_id', 'permission_id']);
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
            //$table->foreignId('permission_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('permission_id');
            $table->timestamps();
            //foreign keys
          $table->foreign('user_id')
          ->references('id')
          ->on('users')
          ->onDelete('cascade');

          $table->foreign('permission_id')
          ->references('id')
          ->on('permissions')
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
        Schema::dropIfExists('permission_user');
    }
}
