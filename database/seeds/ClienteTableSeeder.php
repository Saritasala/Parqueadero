<?php

use Illuminate\Database\Seeder;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'vehiculo_id' => 1,
            'name' => 'Cliente',
            'last_name' => 'Cliente',
            'email' => 'cliente@admin.com',
            'cedula' => '26176176',
            'phone' => '3146196641',
            'password' => bcrypt('123456'),
            'state' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
