<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DevelopmentToolSeeder extends Seeder
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
                'title' => $var = 'PHP',
                'short_description' => 'short_description',
                'long_description' => 'long_description',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'C++',
                'short_description' => 'short_description',
                'long_description' => 'long_description',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'Laravel',
                'parent_id' => 1,
                'short_description' => 'short_description',
                'long_description' => 'long_description',
                'slug' => str_slug($var),
            ],
            [
                'title' => $var = 'Unreal Engine',
                'parent_id' => 2,
                'short_description' => 'short_description',
                'long_description' => 'long_description',
                'slug' => str_slug($var),
            ],
        ];

        foreach ($data as $single){
            \App\Models\Project\DevelopmentTool::create($single);
        }
    }
}
