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
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            ReciboSeeder::class,
            FacturaSeeder::class,
            CategoriaSeeder::class,
            ProductoSeeder::class,
            CarritoSeeder::class,
            ComprasSeeder::class,
            TipoPagoSeeder::class,
            EntregaSeeder::class,
        ]);
    }
}
