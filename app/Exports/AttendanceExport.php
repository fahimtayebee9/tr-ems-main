<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use App\Models\Employee;
use App\Models\CompanyPolicy;

class AttendanceExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithColumnFormatting, WithStyles
{
    protected $month;
    protected $year;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }

    // styling text to center and font bold and background color in excel header
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:AG1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()->setFillType(Fill::FILL_SOLID);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()->getStartColor()->setARGB('FFA0A0A0');
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(36);

                $cellRange = 'A2:AG50'; // All Employee Info
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(10);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(false);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                

                $cellRange = 'A2:A50'; // All Employee Info
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(10);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(false);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()->setFillType(Fill::FILL_SOLID);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()->getStartColor()->setRGB('EAF6F6');

                $cellRange = 'B2:B50'; // All Employee Info
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(10);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(false);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()->setFillType(Fill::FILL_SOLID);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()->getStartColor()->setRGB('EEEEEE');

                // auto fit column width for AG2:AG8
                $event->sheet->getDelegate()->getColumnDimension('AG')->setAutoSize(true);
            },
        ];
    }

    // add column formatting
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_TEXT,
            'H' => NumberFormat::FORMAT_TEXT,
            'I' => NumberFormat::FORMAT_TEXT,
            'J' => NumberFormat::FORMAT_TEXT,
            'K' => NumberFormat::FORMAT_TEXT,
            'L' => NumberFormat::FORMAT_TEXT,
            'M' => NumberFormat::FORMAT_TEXT,
            'N' => NumberFormat::FORMAT_TEXT,
            'O' => NumberFormat::FORMAT_TEXT,
            'P' => NumberFormat::FORMAT_TEXT,
            'Q' => NumberFormat::FORMAT_TEXT,
            'R' => NumberFormat::FORMAT_TEXT,
            'S' => NumberFormat::FORMAT_TEXT,
            'T' => NumberFormat::FORMAT_TEXT,
            'U' => NumberFormat::FORMAT_TEXT,
            'V' => NumberFormat::FORMAT_TEXT,
            'W' => NumberFormat::FORMAT_TEXT,
            'X' => NumberFormat::FORMAT_TEXT,
            'Y' => NumberFormat::FORMAT_TEXT,
            'Z' => NumberFormat::FORMAT_TEXT,
            'AA' => NumberFormat::FORMAT_TEXT,
            'AB' => NumberFormat::FORMAT_TEXT,
            'AC' => NumberFormat::FORMAT_TEXT,
            'AD' => NumberFormat::FORMAT_TEXT,
            'AE' => NumberFormat::FORMAT_TEXT,
            'AF' => NumberFormat::FORMAT_TEXT,
            'AG' => NumberFormat::FORMAT_TEXT,
        ];
    }

    // apply text color and background color if late or absent or present
    public function styles(Worksheet $sheet)
    {
        $total_days = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        $employeeList = Employee::all();
        $companyPolicy = CompanyPolicy::orderby('id','desc')->first();
        
        $office_start_time = $companyPolicy->office_start_time;
        $office_end_time = $companyPolicy->office_end_time;
        $extended_office_start_time = date('H:i:s', strtotime($office_start_time . ' + ' . $companyPolicy->buffer_time . ' minutes'));

        $row = 2;
        // foreach ($employeeList as $employee) {
        //     for ($i=1; $i <= $total_days; $i++) { 
        //         $date = $this->year . "-" . $this->month . "-" . $i;
        //         $attendance = Attendance::where('employee_id', $employee->id)->where('date', $date)->first();

        //         if ($attendance) {
        //             if($attendance->status == 6 || $attendance->in_time > $extended_office_start_time) {
        //                 // dd(chr(65 + $i + 1) . $row);
        //                 $sheet->getStyle(chr(65 + $i + 1) . $row)->getFont()->getColor()->setRGB('FEB139');
        //                 $sheet->getStyle(chr(65 + $i + 1) . $row)->getFill()->setFillType(Fill::FILL_SOLID);
        //                 $sheet->getStyle(chr(65 + $i + 1) . $row)->getFill()->getStartColor()->setRGB('FFF6C3');
        //             }
        //             elseif($attendance->status == 1 || $attendance->in_time < $extended_office_start_time) {
        //                 $sheet->getStyle(chr(65 + $i + 1) . $row)->getFont()->getColor()->setRGB('285430');
        //                 $sheet->getStyle(chr(65 + $i + 1) . $row)->getFill()->setFillType(Fill::FILL_SOLID);
        //                 $sheet->getStyle(chr(65 + $i + 1) . $row)->getFill()->getStartColor()->setRGB('DFFFD8');
        //             }
        //         }
        //     }
        //     $row++;
        // }
    }

    public function collection()
    {
        // return Attendance::all();
        $total_days = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        $employeeList = Employee::all();
        $companyPolicy = CompanyPolicy::orderby('id','desc')->first();
        
        $office_start_time = $companyPolicy->office_start_time;
        $office_end_time = $companyPolicy->office_end_time;
        $extended_office_start_time = date('H:i:s', strtotime($office_start_time . ' + ' . $companyPolicy->attendance_buffer_time . ' minutes'));

        $export_data = [];
        $row = 2;
        foreach ($employeeList as $employee) {
            $data = [];
            $data['employee'] = $employee->user->first_name . " " . $employee->user->last_name;
            $data['employee_id'] = $employee->employee_id;
            
            for ($i=1; $i <= $total_days; $i++) { 
                $date = $this->year . "-" . $this->month . "-" . $i;
                $customDateFormat = \Carbon\Carbon::parse($this->year . "-" . $this->month . "-" . $i)->format('d-M-Y');
                $attendance = Attendance::where('employee_id', $employee->id)->where('date', $date)->first();
                $weekDay = date('l', strtotime($date));
                // dd($weekDay);
                if ($attendance) {
                    $data[$customDateFormat] = $attendance->status;
                    $in_time = \Carbon\Carbon::parse($attendance->in_time);
                    $ext_time = \Carbon\Carbon::parse($extended_office_start_time);

                    // dd($attendance->status == 6 && $in_time->gt($ext_time), $attendance->status == 1 && $in_time->lte($ext_time));

                    if($attendance->status == 6 && $in_time->gt($ext_time)) {
                        $data[$customDateFormat] = date('H:i a', strtotime($attendance->in_time)) . ' (L)';
                    }
                    else if($attendance->status == 1 && $in_time->lte($ext_time)) {
                        $data[$customDateFormat] = date('H:i a', strtotime($attendance->in_time));
                    }
                }
                else if($weekDay != 'Sunday') {
                    $data[$customDateFormat] = "Absent";
                }
                else if($weekDay == 'Sunday'){
                    $data[$customDateFormat] = "Weekend";
                }
                else {
                    $data[$customDateFormat] = "N/A";
                }
            }
            
            $total_present = Attendance::where('employee_id', $employee->id)
                ->where('in_time', "<=",$extended_office_start_time)
                ->wherebetween('date', [$this->year . "-" . $this->month . "-01", $this->year . "-" . $this->month . "-" . $total_days])
                ->distinct('date')
                ->count();
            $total_late = Attendance::where('employee_id', $employee->id)
                ->wherebetween('in_time', [$extended_office_start_time, $office_end_time])
                ->wherebetween('date', [$this->year . "-" . $this->month . "-01", $this->year . "-" . $this->month . "-" . $total_days])
                ->distinct('date')
                ->count();
            $total_absent = $total_days - ($total_present + $total_late);
            
            $data['summary'] = "Present: " . $total_present . ",\r\nLate: " . $total_late . ",\r\nAbsent: " . $total_absent;
            
            $export_data[] = $data;
        }
        
        return collect($export_data);

    }

    public function headings(): array
    {
        $total_days = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        $headings = [];
        $headings[] = 'Employee Name';
        $headings[] = 'Employee ID';
        for ($i=1; $i <= $total_days; $i++) { 
            $customDateFormat = \Carbon\Carbon::parse($this->year . "-" . $this->month . "-" . $i)->format('d-M-Y');
            $headings[] = $customDateFormat;
        }
        $headings[] = 'Summary';
        return $headings;
    }
}
