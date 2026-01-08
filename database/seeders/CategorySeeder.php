<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            ['name' =>'Romance'],
            ['name' =>'Terror'],
            ['name' =>'Infantil'],
            ['name' =>'Fantasia'],
            ['name' =>'Biografia'],
            ['name' =>'História'],
            ['name' =>'Ciência'],
            ['name' =>'Aventura'],
            ['name' =>'Religião'],
            ['name' =>'Suspense'],
            ['name' =>'Ficção Ciêntifica'],
        ];

        foreach ($categories as $category) {

            DB::table('categories')->insert($category);
}

    }
}
