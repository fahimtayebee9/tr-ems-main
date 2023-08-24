<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LaunchSheet;
use App\Models\Attendance;

class LaunchSheetFactory extends Factory
{
    protected $model = LaunchSheet::class;

    public function definition()
    {
        $start_date = new \DateTime(date('Y-m-1'));
        $end_date = new \DateTime(date('Y-m-d'));
        $faker = \Faker\Factory::create();
        $employeeList = Employee::all();
        $months = ['01', '02', '03', '04'];

        foreach($months as $month){
            $total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
            for($i = 1; $i <= $total_days_in_month; $i++){
                $date = date('Y-' . $month . '-' . $i);
                $day = date('D', strtotime($date));
                if($day != 'Sun'){
                    foreach($employeeList as $employee){
                        $attendance = Attendance::where('employee_id', $employee->id)
                            ->whereDate('date', $date)
                            ->first();

                        if (!$attendance) {
                            return $this->definition();
                        }
                        
                        return [
                            'date' => $attendance->date,
                            'user_id' => $attendance->employee->user_id,
                            'attendance_id' => $attendance->id,
                            'status' => rand(0, 1),
                        ];
                    }
                }
            }
        }
    }
}
