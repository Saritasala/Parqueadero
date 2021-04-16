<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrador',
            'unique' => 1,
            'state'=> 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'name' => 'Empleado',
            'unique' => 2, 
            'state'=> 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
