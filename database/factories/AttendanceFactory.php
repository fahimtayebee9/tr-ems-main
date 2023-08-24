<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Attendance;
use App\Models\Employee;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;
    
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $employeeList = Employee::all();
        
        $months = ['01', '02', '03', '04'];
        $month = $months[rand(0, 3)];
        $total_days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
        foreach($employeeList as $employee){
            for($i = 1; $i <= $total_days_in_month; $i++){
                $date = date('Y-' . $month . '-' . $i);
                $day = date('D', strtotime($date));
                if($day != 'Sun'){
                    $attendance = Attendance::where('employee_id', $employee->id)
                        ->whereDate('date', $date)
                        ->first();
                    if ($attendance == null) {
                        $in_time = $faker->dateTimeBetween($date . ' 09:00', $date . ' 09:30');
                        $out_time = $faker->dateTimeBetween($date . ' 17:00', $date . ' 18:00');
                        // dd($in_time, $out_time, $employee->id, $date);
                        return [
                            'employee_id'   => $employee->id,
                            'date'          => $date,
                            'in_time'       => $in_time,
                            'out_time'      => $out_time,
                            'status'        => $in_time > new \DateTime('09:30') ? 6 : 1,
                        ];
                    }
                    else{
                        return $this->definition();
                    }
                }
            }
        }
    }
}
