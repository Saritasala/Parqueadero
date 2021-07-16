<?php

use Illuminate\Database\Seeder;

class TarifasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarifas')->insert([
            'title' => 'Tarifa 1',
            'description' => 'Vehiculos particulares',
            'precio' => '12000',
            'tipo_vehiculo' => 'Caminoneta',
            'state' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
