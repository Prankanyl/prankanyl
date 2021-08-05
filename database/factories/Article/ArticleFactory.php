<?php

namespace Database\Factories\Article;

use App\Models\Article\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_category_id' => $this->faker->numberBetween(1, 3),
            'title' => $var = $this->faker->name,
            'short_description' => $this->faker->paragraph(15),
            'long_description' => $this->faker->paragraph(25),
            'color' => $this->faker->rgbCssColor,
        ];
    }
}
