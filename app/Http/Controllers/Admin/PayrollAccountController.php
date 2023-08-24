<?php

namespace App\Http\Controllers\Admin;

use App\Models\PayrollAccount;
use App\Http\Requests\StorePayrollAccountRequest;
use App\Http\Requests\UpdatePayrollAccountRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use App\Models\CompanyPolicy;
use App\Models\EmployeeSalarySheet;
use App\Models\MonthlySalaryReport;
use App\Exports\EmployeeSalarySheetExport;
use Maatwebsite\Excel\Facades\Excel;

class PayrollAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'payroll_accounts',
                'page_title' => 'Payroll Management',
                'page_title_description' => 'Manage All Employee Salary Details',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Payroll Management' => "",
                ],
            ]);
    
            $months = [
                '01' => 'January',
                '02' => 'February',
                '03' => 'March',
                '04' => 'April',
                '05' => 'May',
                '06' => 'June',
                '07' => 'July',
                '08' => 'August',
                '09' => 'September',
                '10' => 'October',
                '11' => 'November',
                '12' => 'December',
            ];
            $years = [
                '2020' => '2020',
                '2021' => '2021',
                '2022' => '2022',
                '2023' => '2023',
                '2024' => '2024',
                '2025' => '2025',
                '2026' => '2026',
                '2027' => '2027',
                '2028' => '2028',
                '2029' => '2029',
                '2030' => '2030',
            ];
    
            $payrollAccounts    = PayrollAccount::all();
            $users              = User::all();
            $employeeList       = Employee::all();
            $attendanceList     = Attendance::all();
            $companyPolicy      = CompanyPolicy::orderby('id', 'desc')->first();
            $employeeSalarySheet= EmployeeSalarySheet::all();
            $monthlySalaryReport= MonthlySalaryReport::all();
            return view('admin.payroll.index', compact('monthlySalaryReport', 'payrollAccounts', 'users', 'employeeList', 'attendanceList', 'companyPolicy', 'months', 'years', 'employeeSalarySheet'));
        }
    }

    public function generatePayroll(Request $request){
        // dd($request->all());
        $request->validate([
            'salary_month' => 'required',
            'salary_year' => 'required',
        ]);

        $employeeList = Employee::all();
        $attendanceList = Attendance::all();
        $companyPolicy = CompanyPolicy::orderby('id', 'desc')->first();
        $employeeSalarySheet = EmployeeSalarySheet::all();

        $month_total_salary = 0;
        $month_total_deduction = 0;
        $month_total_net_salary = 0;
        $empSalarySheet_ids = [];

        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];
        $years = [
            '2020' => '2020',
            '2021' => '2021',
            '2022' => '2022',
            '2023' => '2023',
            '2024' => '2024',
            '2025' => '2025',
            '2026' => '2026',
            '2027' => '2027',
            '2028' => '2028',
            '2029' => '2029',
            '2030' => '2030',
        ];
        
        foreach ($employeeList as $emp) {
            $custom_date = $request->salary_year.'-'.$request->salary_month.'-01';
            $total_days_in_month = \Carbon\Carbon::parse($custom_date)->daysInMonth;
            $total_payable_salary = 0;
            $total_deduction = 0;
            
            $total_ontime_attendance = \App\Models\Attendance::where('employee_id', $emp->id)
                                        ->whereBetween('date', [ $request->salary_year.'-'.$request->salary_month.'-01',  $request->salary_year.'-'.$request->salary_month.'-'.$total_days_in_month])
                                        ->where('status', 1)->distinct('date')->count();
            $total_late_attendance = \App\Models\Attendance::where('employee_id', $emp->id)
                                        ->whereBetween('date', [ $request->salary_year.'-'.$request->salary_month.'-01',  $request->salary_year.'-'.$request->salary_month.'-'.$total_days_in_month])
                                        ->where('status', 6)->distinct('date')->count();
            
            $paid_leaves = \App\Models\LeaveApplication::where('employee_id', $emp->id)
                            ->whereDate('leave_from', ">=", $request->salary_year.'-'.$request->salary_month.'-01')
                            ->whereDate('leave_to', "<=", $request->salary_year.'-'.$request->salary_month.'-'.$total_days_in_month)
                            ->where('leave_type', 1)->where('approved_by_astmanager', 2)->where('approved_by_hr',2)->get();

            $unpaid_leaves = \App\Models\LeaveApplication::where('employee_id', $emp->id)
                            ->whereDate('leave_from', ">=", $request->salary_year.'-'.$request->salary_month.'-01')
                            ->whereDate('leave_to', "<=", $request->salary_year.'-'.$request->salary_month.'-'.$total_days_in_month)
                            ->where('leave_type', 2)->orwhere('leave_type', 3)->where('approved_by_astmanager', 2)->where('approved_by_hr',2)->get();
            
            foreach ($paid_leaves as $leave) {
                $lstart = \Carbon\Carbon::parse($leave->start_date);
                $lend = \Carbon\Carbon::parse($leave->end_date);
                $total_ontime_attendance += $lstart->diffInDays($lend);
            }
            
            $unpaid_leaves_count = 0;
            foreach ($unpaid_leaves as $leave) {
                $lstart = \Carbon\Carbon::parse($leave->start_date);
                $lend = \Carbon\Carbon::parse($leave->end_date);
                $unpaid_leaves_count += $lstart->diffInDays($lend);
            }
            
            $total_absent = $total_days_in_month - ($total_ontime_attendance + $total_late_attendance) + $unpaid_leaves_count;
    
            $emp_daily_salary = $emp->monthly_salary / $total_days_in_month;
    
            if ($total_late_attendance > 0) {
                if($companyPolicy->late_attendance_rule == 1){
                    if($companyPolicy->half_day_absent_rule == 1){
                        // calculate daily deduction amount if half_day_absent_rule_value_type is 1 then calculate by percentage
                        $deduction = $companyPolicy->half_day_absent_rule_value_type == 1 ? 
                                                    ($emp_daily_salary * $companyPolicy->half_day_absent_rule_value) / 100 : $companyPolicy->half_day_absent_rule_value;
                        $total_deduction += $total_late_attendance * $deduction;
                    }
                    else{
                        $total_deduction += $total_late_attendance * $half_day_absent_rule_value;
                    }
                }
                else if($companyPolicy->late_attendance_rule == 2){
                    if($companyPolicy->full_day_absent_rule == 1){
                        // calculate daily deduction amount if full_day_absent_rule
                        $deduction = $companyPolicy->full_day_absent_rule_value_type == 1 ? 
                                                    ($emp_daily_salary * $companyPolicy->full_day_absent_rule_value) / 100 : $companyPolicy->half_day_absent_rule_value;
                        $total_deduction += $total_late_attendance * $deduction;
                    }
                }
            }
    
            if ($total_absent > 0) {
                if($companyPolicy->full_day_absent_rule == 1){
                    $deduction = $companyPolicy->full_day_absent_rule_value_type == 1 ? 
                                    ($emp_daily_salary * $companyPolicy->full_day_absent_rule_value) / 100 : $companyPolicy->half_day_absent_rule_value;
                    $total_deduction += $total_late_attendance * $deduction;
                }
                else{
                    $total_deduction += $total_absent * $half_day_absent_rule_value;
                }
            }
    
            $total_payable_salary += $emp->monthly_salary - $total_deduction;
            
            
            $payroll_data = new EmployeeSalarySheet();
            $payroll_data->employee_id = $emp->id;
            $payroll_data->payroll_account_id = ($emp->payrollAccount != null) ? $emp->payrollAccount->id : null;
            $payroll_data->salary_month = $request->salary_month;
            $payroll_data->salary_year = $request->salary_year;
            $payroll_data->other_allowance = 0;
            $payroll_data->total_deduction = $total_deduction;
            $payroll_data->total_salary = $emp->monthly_salary;
            $payroll_data->net_salary = $total_payable_salary;
            $payroll_data->save();

            $empSalarySheet_ids[] = $payroll_data->id;
            $month_total_salary += $emp->monthly_salary;
            $month_total_deduction += $total_deduction;
            $month_total_net_salary += $total_payable_salary;
        }

        $payroll_monthly_report                     = new MonthlySalaryReport();
        $payroll_monthly_report->report_name        = "Salary Report ". $months[$request->salary_month] ."-".$request->salary_year;
        $payroll_monthly_report->salary_month       = $request->salary_month;
        $payroll_monthly_report->salary_year        = $request->salary_year;
        $payroll_monthly_report->total_salary       = $month_total_salary;
        $payroll_monthly_report->total_deduction    = $month_total_deduction;
        $payroll_monthly_report->net_payable_salary = $month_total_net_salary;
        $payroll_monthly_report->employee_salary_sheet_ids   = json_encode($empSalarySheet_ids);
        $payroll_monthly_report->salary_status      = 0;
        $payroll_monthly_report->payment_date       = null;
        $payroll_monthly_report->save();

        return redirect()->route('admin.payroll.index')->with('success', 'Payroll Generated Successfully');
    }

    public function downloadPayrollExcel(Request $request){
        $export     = new EmployeeSalarySheetExport($request->salary_month, $request->salary_year);
        $file_name  = $request->report_name . '.xlsx';
        return Excel::download($export, $file_name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePayrollAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePayrollAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PayrollAccount  $payrollAccount
     * @return \Illuminate\Http\Response
     */
    public function show(PayrollAccount $payrollAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PayrollAccount  $payrollAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(PayrollAccount $payrollAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePayrollAccountRequest  $request
     * @param  \App\Models\PayrollAccount  $payrollAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayrollAccountRequest $request, PayrollAccount $payrollAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PayrollAccount  $payrollAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(PayrollAccount $payrollAccount)
    {
        //
    }
}
