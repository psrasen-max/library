<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
        AuthorSeeder::class,
        BookSeeder::class,
        EntrieSeeder::class,
        RentSeeder::class,
        ReservationSeeder::class,
        ReviewsSeeder::class,
        SaleSeeder::class,
        UserSeeder::class,
        ]);
    }
}
