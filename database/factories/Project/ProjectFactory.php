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
            'title' => $var = $this->faker->name,
            'project_categories_id' => $this->faker->numberBetween(1, 4),
            'short_description' => $this->faker->paragraph(15),
            'long_description' => $this->faker->paragraph(25),
            'finished' => $this->faker->numberBetween(0, 1),
            'version' => 'v'.$this->faker->numberBetween(1, 9).'.'.$this->faker->randomFloat(1, 1, 20),
//            'image' => $this->faker->name,
//            'link' => $this->faker->url,
//            'logo' => $this->faker->image,
            'slug' => str_slug($var),
        ];
    }
}
