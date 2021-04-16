<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
            'last_name' => 'Administrador',
            'email' => 'admin@admin.com',
            'phone' => '3146196681',
            'password' => bcrypt('123456'),
            'role_id' => 1,
            'state' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
