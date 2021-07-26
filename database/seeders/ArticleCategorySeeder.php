<?php

namespace Database\Seeders;

use App\Models\Article\ArticleCategory;
use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => $var = 'Project',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'News',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'Memes',
                'slug' => str_slug($var),
            ],
        ];

        foreach ($data as $single){
            ArticleCategory::create($single);
        }
    }
}
