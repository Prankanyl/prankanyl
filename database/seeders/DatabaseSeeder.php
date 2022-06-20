<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            SettingsSeeder::class,
            SiteInformationsSeeder::class,
            SocialNetworksSeeder::class,
            AdminSeeder::class,
            ArticleCategorySeeder::class,
            ProjectCategorySeeder::class,
            ProjectTypeSeeder::class,
            DevelopmentToolSeeder::class,
        ]);

        if(env('APP_ENV') == 'local'){
            // faker
            $this->call([
                ArticleSeeder::class,
                ProjectSeeder::class,
            ]);
        }

        $arr_random = [];
        for($i = 1; $i <= 12; $i++){
            $arr_random[$i] = $i;
        }

        for($i = 1; $i <= 27; $i++){
            $rand = mt_rand(1, 12);
            $rand_keys = array_rand($arr_random, $rand);
            for($j = 0; $j < $rand; $j++){
                DB::table('project_development_tool')->insert([
                    'project_id' => $i,
                    'development_tool_id' => $rand_keys[$j]
                ]);
            }
        }

        for($i = 1; $i <= 27; $i++){
            $rand = mt_rand(1, 4);
            for($j = 1; $j <= $rand; $j++){
                DB::table('project_project_type')->insert([
                    'project_id' => $i,
                    'project_types_id' => $j
                ]);
            }
        }

    }
}
