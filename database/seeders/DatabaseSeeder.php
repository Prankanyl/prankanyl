<?php

namespace Database\Seeders;

use App\Models\Article\ArticleCategory;
use App\Models\ProjectCategory;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            AdminSeeder::class,
            ArticleCategorySeeder::class,
            ArticleSeeder::class,
            ProjectCategorySeeder::class,
        ]);
    }
}
