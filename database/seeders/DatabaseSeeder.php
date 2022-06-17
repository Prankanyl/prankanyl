<?php

namespace Database\Seeders;

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
//            SettingsSeeder::class,
//            SiteInformationsSeeder::class,
//            SocialNetworksSeeder::class,
//            AdminSeeder::class,
//            ArticleCategorySeeder::class,
            ArticleSeeder::class,

//            ProjectCategorySeeder::class,
//            ProjectTypeSeeder::class,
//            DevelopmentToolSeeder::class,
//            ProjectSeeder::class,
        ]);

    }
}
