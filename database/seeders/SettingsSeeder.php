<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
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
                'title' => 'My Summary Site',
                'favicon' => 'favicon.png',
                'logo' => 'logo.png',
                'email' => 'v752433@icloud.com',
                'phone' => '+375 (29) 294-15-17',
                'address' => 'Minsk, Belarus',
                'description' => 'I made a small website so that you could get acquainted with my practical knowledge. Currently used here Laravel Framework and Backpack (admin panel for laravel). In the future, I will expand the capabilities and technologies of the site. To access the admin panel, type in the authorization data: email - admin@admin.com, password - Qwerty12! . Pleasant viewing :)',
                'background_color' => 'rgb(218, 16, 87)',
                'text_color' => 'rgb(255, 255, 255)',
                'active' => 1,
            ],
            [
                'title' => 'Prankanyl Site',
                'favicon' => 'favicon.png',
                'logo' => 'logo.png',
                'email' => 'v752433@icloud.com',
                'phone' => '+375 (29) 294-15-17',
                'address' => 'Minsk, Belarus',
                'description' => 'description',
                'background_color' => 'rgb(218, 16, 87)',
                'text_color' => 'rgb(255, 255, 255)',
                'active' => 0,
            ],
        ];

        foreach ($data as $single){
            \App\Models\Setting::create($single);
        }
    }
}
