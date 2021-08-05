<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
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
                'title' => $var = 'Website',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'Games',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'IOS',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'Android',
                'slug' => str_slug($var),
            ],
        ];

        foreach ($data as $single){
            \App\Models\ProjectCategory::create($single);
        }
    }
}
