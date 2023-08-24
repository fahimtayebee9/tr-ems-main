<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LaunchSheet;

class LaunchSheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LaunchSheet::factory()->count(200)->create();
    }
}
