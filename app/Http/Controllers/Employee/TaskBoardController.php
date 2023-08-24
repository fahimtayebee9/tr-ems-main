<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskBoard;
use App\Models\TaskComment;
use App\Models\TaskCheckList;
use App\Models\Employee;
use App\Models\User;
use App\Models\RoleManager;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TaskBoardController extends Controller
{
    public function index()
    {
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    "page" => "task-board",
                    "page_title" => "Task Board",
                    "page_icon" => "fas fa-calendar-check",
                    "breadcrumb" => [
                        ["name" => "Home", "link" => route('employee.dashboard') ],
                        ["name" => "Task Board", "link" => ""],
                    ]
                ]
            );
            
            $taskList = TaskBoard::where('assigned_to', Auth::user()->id)->get();
            $employee = Employee::where('user_id', Auth::user()->id)->first();
            $todaysTasks = TaskBoard::where('created_at', \Carbon\Carbon::today()->format('Y-m-d'))
                    ->orWhere('due_date', "<=", \Carbon\Carbon::today()->format('Y-m-d'))
                    ->orWhere('completed_at', \Carbon\Carbon::today()->format('Y-m-d'))->get();
            // dd($todaysTasks);
            return view('employee.pages.task-board.index', compact('taskList', 'employee', 'todaysTasks'));
        }
    }

    public function create(){

    }

    public function store(Request $reqest){
        if(Auth::check() == false  || RoleManager::where('id',auth()->user()->role_id)->first()->slug != 'employee'){
            return redirect()->route('login');
        }
        else{
            $validator = Validator::make($reqest->all(), [
                'title' => 'required',
                'description' => 'required',
                'due_date' => 'required',
                'assigned_to' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $task = new TaskBoard();
            $task->title = $reqest->title;
            $task->description = $reqest->description;
            $task->due_date = $reqest->due_date;
            $task->assigned_to = Auth::user()->id;
            $task->assigned_by = $reqest->assigned_by;
            $task->client_id = $reqest->client_id;
            $task->task_uid = 'ETSB-'. time();
            $task->status = 0;
            $task->priority = $reqest->priority;
            $task->save();
            return view('employee.pages.task-board.index', compact('taskList', 'employee', 'todaysTasks'));
        }
    }

    public function destroy($id){

    }

    public function show($id){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }
}
