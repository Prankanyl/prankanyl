<?php

namespace Database\Seeders;

use App\Models\Project\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory()
            ->count(10)
            ->create();
    }
}
