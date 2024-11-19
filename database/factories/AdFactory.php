<?php

namespace Database\Factories;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ad>
 */
class AdFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Ad::class;

    /**
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'category' => $this->faker->randomElement(['Auto', 'Animals', 'Tech', 'Other']),
            'published_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
