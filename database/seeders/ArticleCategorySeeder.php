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
                'icon' => 'la la-terminal',
            ],
            [
                'title' => $var = 'News',
                'icon' => 'la la-globe',
            ],
            [
                'title' => $var = 'Memes',
                'icon' => 'la la-baby',
            ],
        ];

        foreach ($data as $single){
            ArticleCategory::create($single);
        }
    }
}
