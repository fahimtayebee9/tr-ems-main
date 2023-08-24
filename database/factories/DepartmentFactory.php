<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;
use Illuminate\Support\Str;

class DepartmentFactory extends Factory
{
    protected $model = Department::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->unique()->word,
            // 'slug' => Str::slug($this->faker->unique()->word),
            // 'description' => $this->faker->sentence,
        ];
    }
}
