<?php

namespace App\Http\Controllers\Admin;

use App\Models\TaskSubmission;
use App\Http\Requests\StoreTaskSubmissionRequest;
use App\Http\Requests\UpdateTaskSubmissionRequest;
use App\Models\Employee;
use App\Models\TaskForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmployeeRole;
use App\Models\User;
use App\Models\TaskBoard;
use Illuminate\Support\Facades\Auth;

class TaskSubmissionController extends Controller
{
    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'task-submissions',
                    'page_title' => 'Task Submissions',
                    'page_title_description' => 'Manage and View Submissions',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Tasks' => ''
                    ],
                ]
            );

            // $taskForms = TaskForm::all();
            $taskSubmissions = TaskBoard::orderby('created_at', 'asc')->get();
            $employeesList = Employee::orderby('employee_id', 'asc')->get();
            $designations = EmployeeRole::all();

            $taskSubmissions_dates = TaskBoard::select('completed_at')->orderby('completed_at', 'asc')->groupBy('completed_at')->get();

            return view('admin.tasks.index-v2', compact('taskSubmissions', 'taskSubmissions_dates','employeesList', 'designations'));
        }
    }

    public function getByDate($request)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $taskSubmissions = TaskSubmission::orderby('id', 'desc')->whereDate('created_at', $request)->get();
            $employees = Employee::all();
            $taskForms = TaskForm::all();
            $designations = EmployeeRole::all();

            return response()->json([
                'taskSubmissions' => $taskSubmissions,
                'employees' => $employees,
                'taskForms' => $taskForms,
                'users' => User::all(),
                'designations' => $designations,
            ]);
        }
    }

    public function getbyDesignation($request)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $taskSubmissions = TaskSubmission::orderby('id', 'desc')->get();
            
            // filter by designation
            $tasks_by_designation = [];
            foreach ($taskSubmissions as $task) {
                if($request == $task->employee->designation_id){
                    $tasks_by_designation[] = $task;
                }
            }
            $taskSubmissions = collect($tasks_by_designation);
            $employees = Employee::all();
            $taskForms = TaskForm::all();
            $designations = EmployeeRole::all();

            return response()->json([
                'taskSubmissions' => $taskSubmissions,
                'employees' => $employees,
                'taskForms' => $taskForms,
                'users' => User::all(),
                'designations' => $designations,
            ]);
        }
    }

    public function show($taskSubmissionDate, $employeeId)
    {
        $role_id = Auth::user()->role_id;
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'task-submissions',
                    'page_title' => 'Task Submissions',
                    'page_title_description' => 'Manage and View Submissions',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Tasks' => ''
                    ],
                ]
            );

            // dd("Employee ID: " . $employeeId, "Date: " . $taskSubmissionDate);
            
            $employee           = Employee::where('employee_id', $employeeId)->first();
            $taskSubmissions    = DailyTask::where('emp_id', $employee->id)->whereDate('submission_date', $taskSubmissionDate)->get();
            
            return view('admin.tasks.show', compact('taskSubmissions', 'employee', 'taskSubmissionDate'));
        }
    }

}
