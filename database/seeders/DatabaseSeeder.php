<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Category::create(['category_name' => 'Легкий']);
        Category::create(['category_name' => 'Тяжелый']);
        Category::create(['category_name' => 'Хрупкий']);
    }
}
