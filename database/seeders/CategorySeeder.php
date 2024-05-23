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
        DB::table('categories')->insert([
            ['title' => 'Electronics', 'description' => 'Electronic items'],
            ['title' => 'Books', 'description' => 'All kinds of books'],
            ['title' => 'Clothing', 'description' => 'Men and women clothing'],
        ]);
    }
}
