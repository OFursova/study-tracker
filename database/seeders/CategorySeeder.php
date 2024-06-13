<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Article']);
        Category::create(['name' => 'Book']);
        Category::create(['name' => 'Course']);
        Category::create(['name' => 'Video']);
    }
}
