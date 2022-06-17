<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialNetworksSeeder extends Seeder
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
                'icon' => 'la-facebook',
                'link' => 'https://www.facebook.com/',
            ],
            [
                'icon' => 'la-telegram',
                'link' => 'https://www.telegram.org/',
            ],
            [
                'icon' => 'la-google',
                'link' => 'https://www.google.com/',
            ],
            [
                'icon' => 'la-linkedin',
                'link' => 'https://www.linkedin.com/',
            ],
            [
                'icon' => 'la-github',
                'link' => 'https://www.github.com/',
            ],
        ];

        foreach ($data as $single){
            \App\Models\SocialNetwork::create($single);
        }
    }
}
