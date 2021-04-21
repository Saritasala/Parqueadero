<?php

use Illuminate\Database\Seeder;

class ParametrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametros')->insert([
            'name' => 'Pago',
            'state'=> 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('parametros')->insert([
            'name' => 'No pago',
            'state'=> 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('parametros')->insert([
            'name' => 'En proceso',
            'state'=> 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('parametros')->insert([
            'name' => 'Enviado',
            'state'=> 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
