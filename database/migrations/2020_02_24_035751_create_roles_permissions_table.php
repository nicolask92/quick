<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
    
            $table->unsignedInteger('role_id');
            $table->foreign('role_id','fk_permisorol_rol')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id','fk_permisorol_permiso')->references('id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_permissions');
    }
}
