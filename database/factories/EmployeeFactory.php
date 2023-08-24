<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;
use App\Models\User;
use App\Models\EmployeeRole;
use App\Models\Department;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->unique()->numberBetween(1000000, 9999999),
            'user_id' => User::factory(),
            'department_id' => Department::factory(),
            'designation_id' => EmployeeRole::factory(),
            'team_lead_id' => Employee::factory(),
            'temporary_role' => null,
            'salary' => $this->faker->numberBetween(10000, 50000),
            'awards_won' => $this->faker->numberBetween(0, 10),
            'joining_date' => $this->faker->dateTimeBetween(new \DateTime('2010-01-01'), new \DateTime('2020-01-01')),
        ];
    }
}
