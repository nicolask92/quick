<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_roles', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'fkuserrol_users')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
           
            $table->unsignedInteger('role_id');
            $table->foreign('role_id',  'fkuserrol_roles')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
         
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_roles');
    }
}
