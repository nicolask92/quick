<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('users_roles')->insert([
            'user_id' => '1',
            'role_id' => '1',
        ]);

        
    }
}
