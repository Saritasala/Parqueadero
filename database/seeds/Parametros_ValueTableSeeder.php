<?php

use Illuminate\Database\Seeder;

class Parametros_ValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametros_values')->insert([
            'name' => 'Efectivo',
            'state'=> 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parametros_values')->insert([
            'name' => 'Cheque',
            'state'=> 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parametros_values')->insert([
            'name' => 'Tarjeta',
            'state'=> 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
