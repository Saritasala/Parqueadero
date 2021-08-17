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
            'clientes_id'=> 1,
            'parqueadero_id'=> 1,
            'placa' => 'CRC222',
            'modelo' => 'Comercio',
            'color' => 'Calle 33',
            'fecha_entrada' => '2021-07-14',
            'hora' => '23:43:30',
            'fecha_salida' => '2021-07-14',
            'hora_salida' => '23:43:30',
            'puesto' => 1,
            'state' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
