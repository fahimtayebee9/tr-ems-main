<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MeetingNote;

class MeetingNoteSeeder extends Seeder
{
    public function run()
    {
        MeetingNote::factory()->count(400)->create();
    }
}
