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
        $categories = [
            ['name' => 'Легкий'],
            ['name' => 'Тяжелый'],
            ['name' => 'Хрупкий'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
