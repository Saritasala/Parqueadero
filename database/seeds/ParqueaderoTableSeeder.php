<?php

use Illuminate\Database\Seeder;

class ParqueaderoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parqueadero')->insert([
            'puestos' => 12,
            'nombre' => 'Uno',
            'pisos' => 1,
            'state' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
