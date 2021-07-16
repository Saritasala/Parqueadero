<?php

use Illuminate\Database\Seeder;

class VehiculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehiculos')->insert([
            'user_id'=> 1,
            'clientes_id'=> 2,
            'placa' => 'CRC222',
            'modelo' => 'Comercio',
            'color' => 'Calle 33',
            'fecha_entrada' => '2021-07-14 04:46:51.000000',
            'fecha_salida' => '2021-07-14 04:46:51.000000',
            'state' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
