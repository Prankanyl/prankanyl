<?php

namespace Database\Seeders;

use App\Models\Article\ArticleCategory;
use App\Models\Project\DevelopmentTool;
use App\Models\Project\Project;
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
        $this->call([
            AdminSeeder::class,
            ArticleCategorySeeder::class,
            ArticleSeeder::class,

            ProjectCategorySeeder::class,
            ProjectTypeSeeder::class,
            DevelopmentToolSeeder::class,
//            ProjectSeeder::class,
        ]);
    }
}
