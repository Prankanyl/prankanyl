<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiteInformationsSeeder extends Seeder
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
                'title' => 'Create Projects',
                'color' => 'green',
                'description' => 'I PHP Fullstack Develop projects with Laravel Framework. I specialize in CRM.',
                'icon' => 'la-tasks'
            ],
            [
                'title' => 'DevOps',
                'color' => 'blue',
                'description' => 'I can deploy the project to production server. By using docker or set up a server from scratch.',
                'icon' => 'la-server'
            ],
            [
                'title' => 'Education',
                'color' => 'red',
                'description' => 'I constantly study modern technologies and try new ways of writing projects. But ready to try something new.',
                'icon' => 'la-gem'
            ],
        ];

        foreach ($data as $single){
            \App\Models\SiteInformation::create($single);
        }
    }
}
