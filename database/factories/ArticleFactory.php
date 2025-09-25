<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'slug' => Str::slug($this->faker->unique()->sentence(2)),
            'status' => $this->faker->randomElement(['deactivate', 'active', 'check']),
            'meta_title' => $this->faker->sentence(3),
            'meta_description' => $this->faker->paragraph,
            'description' => $this->faker->paragraphs(3, true),
            'short_description' => $this->faker->sentence(10),
            'user_id' => '1', // یا null اگه نخوای همیشه ست بشه
        ];
    }
}
