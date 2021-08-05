<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
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
                'title' => $var = 'MMO',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'RPG',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'Strategy',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'Sports',
                'slug' => str_slug($var),
            ],
        ];

        foreach ($data as $single){
            \App\Models\Project\ProjectType::create($single);
        }
    }
}
