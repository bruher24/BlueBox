<?php

namespace Database\Seeders;

use App\Models\Category;
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
        collect($categories)->each(function ($category) {
            Category::create($category);
        });
    }
}
