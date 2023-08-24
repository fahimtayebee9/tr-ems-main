<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DailyTask;
use App\Models\Employee;
use App\Models\TaskForm;
use App\Models\ClientAccount;

class DailyTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // a employee can submit multiple tasks
        $faker = \Faker\Factory::create();
        $start_date = new \DateTime(date('Y-m-1'));
        $end_date = new \DateTime(date('Y-m-d'));
        return [
            'emp_id'            => Employee::all()->random()->id,
            'client_account_id' => rand(16,17),
            'task_title'        => $faker->sentence(1),
            'task_description'  => $faker->paragraph(1),
            'submission_date'   => $faker->dateTimeBetween($start_date, $end_date)->format('Y-m-d'),
            'task_drive_link'   => $faker->imageUrl(640, 480, 'cats', true, 'Faker'),
            'task_status'       => rand(1, 3),
        ];
    }
}
