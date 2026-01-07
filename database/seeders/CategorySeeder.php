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
            'category' =>'Romance',
            'category' =>'Terror',
            'category' =>'Infantil',
            'category' =>'Fantasia',
            'category' =>'Biografia',
            'category' =>'História',
            'category' =>'Ciência',
            'category' =>'Aventura',
            'category' =>'Religião',
            'category' =>'Suspense',
            'category' =>'Ficção Ciêntifica',
        ];

        DB::table('Category')->insert($categories);
    }
}
