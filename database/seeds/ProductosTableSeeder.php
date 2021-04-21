<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => 'Cemento',
            'description' => 'Cemento',
            'precio' => '12000',
            'stock' => '12',
            'img_product' => 'default.png',
            'comercio_id' => '1',
            'state' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
