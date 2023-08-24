<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MeetingNote;
use App\Models\ClientAccount;
use App\Models\User;

class MeetingNoteFactory extends Factory
{
    protected $model = MeetingNote::class;

    public function definition()
    {
        $current_month = date('m');
        $total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $current_month, date('Y'));

        $random_date = $this->faker->dateTimeBetween(date('Y-' . $current_month . '-01'), date('Y-' . $current_month . '-' . $total_days_in_month));
        
        return [
            'note' => $this->faker->text(100),
            'note_url' => $this->faker->url,
            'marketplace' => $this->faker->numberBetween(1, 3),
            'priority' => $this->faker->numberBetween(1, 3),
            'client_account_id' => ClientAccount::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'added_on' => $random_date,
        ];
    }
}
