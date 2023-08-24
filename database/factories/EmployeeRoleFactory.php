<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EmployeeRole;
use Illuminate\Support\Str;

class EmployeeRoleFactory extends Factory
{
    protected $model = EmployeeRole::class;
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
