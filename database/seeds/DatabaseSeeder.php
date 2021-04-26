<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserTableSeeder::class,
                     RolesTableSeeder::class,
                     ParametrosSeeder::class,
                     ProductosTableSeeder::class,
                     ComercioTableSeeder::class,
                     ParametrosSeeder::class,
                     Parametros_ValueTableSeeder::class]);
    }
}
