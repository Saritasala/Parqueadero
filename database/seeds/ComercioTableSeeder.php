<?php

use Illuminate\Database\Seeder;

class ComercioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comercios')->insert([
            'name' => 'Argos',
            'description' => 'Comercio',
            'direccion' => 'Calle 33',
            'number' => '313530405',
            'email' => 'admin@admin.com',
            'state' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
