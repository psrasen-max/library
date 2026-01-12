<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([

            UserSeeder::class,
            CategorySeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
            EntrieSeeder::class,
            ReservationSeeder::class,
            RentSeeder::class,
            ReviewSeeder::class,
            SaleSeeder::class,

        ]);
    }
}
