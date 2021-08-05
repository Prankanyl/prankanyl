<?php

namespace Database\Factories\Project;

use App\Models\Project\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'parent_id' => $this->faker->numberBetween(1, 2),
            'title' => $var = $this->faker->name,
            'short_description' => $this->faker->paragraph(15),
            'long_description' => $this->faker->paragraph(25),
            'version' => $this->faker->name,
            'link' => $this->faker->url,
            'logo' => $this->faker->image,
        ];
    }
}
