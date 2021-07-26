<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('email', '=', 'v752433@icloud.com')->doesntExist()) {
            User::forceCreate([
                'name' => 'Admin',
                'email' => 'v752433@icloud.com',
                'password' => bcrypt('1212')
            ]);
        }
    }
}
