<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\Soura;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SouraFactory extends Factory
{
    protected $model = Soura::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'slug' => $this->faker->slug(),
            'file' => $this->faker->word(),
            'format' => $this->faker->word(),
            'size' => $this->faker->word(),
            'download' => $this->faker->word(),
            'soura_title' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'category_id' => category::factory(),
        ];
    }
}
