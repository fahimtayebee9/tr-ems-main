<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DailyTask;

class DailyTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DailyTask::factory()->count(200)->create();
    }
}
