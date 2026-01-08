<?php

namespace Database\Seeders;

use App\Models\Entrie;
use Illuminate\Database\Seeder;

class EntrieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entrie::factory()->count(10)->create();
    }
}
