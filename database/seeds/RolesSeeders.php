<?php

use Illuminate\Database\Seeder;

class RolesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Roles 

        DB::table('roles')->insert([
            'name' => "Administrador",
        ]);

        DB::table('roles')->insert([
            'name' => "Operador",
        ]);
        DB::table('roles')->insert([
            'name' => "A Validar",
        ]);


        //Permisos


        DB::table('permissions')->insert([
            'name' => "Ver",
            'slug' => "ver",
        ]);

        DB::table('permissions')->insert([
            'name' => "Editar",
            'slug' => "editar",
        ]);

        DB::table('permissions')->insert([
            'name' => "Administrar",
            'slug' => "admin",
        ]);

        DB::table('permissions')->insert([
            'name' => "Sin Permisos",
            'slug' => "sin_priv",
        ]);
        

        // Asignacion de Permisos a cada Rol

    
        DB::table('roles_permissions')->insert([
            ['role_id' => '1', 'permission_id' => '3'],
            ['role_id' => '1', 'permission_id' => '2'],
            ['role_id' => '1', 'permission_id' => '1'],
            ['role_id' => '2', 'permission_id' => '1'],
            ['role_id' => '2', 'permission_id' => '2'],
            ['role_id' => '3', 'permission_id' => '4'],
            ]);

    }
}
