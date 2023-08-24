<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Models\RoleManager;
use App\Models\PermissionManager;
use App\Models\EmployeeRole;
use App\Models\Department;
use App\Models\User;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeeImport;

class EmployeeController extends Controller
{
    public function importBulk(Request $request){
        // check if user is logged in
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            if($request->hasFile('bulk_data')){
                $usersList = User::all();
                Excel::import(new EmployeeImport($usersList), $request->file('bulk_data'));

                return redirect()->back()->with([
                    'message' => 'Bulk Imported Successfully',
                    'alert-type' => 'success'
                ]);
            }
            else{
                return redirect()->back()->with([
                    'message' => 'No File Uploaded',
                    'alert-type' => 'error'
                ]);
            }
        }
    }
    
    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'employees',
                'view_type' => 'list_view',
                'page_title' => 'Employee Management',
                'page_title_description' => 'Manage All Employee Details',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Employee Management' => "",
                ],
            ]);
            $employees = Employee::all();
            return view('admin.employees.index', compact('employees'));
        }
    }

    public function gridView()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'employees',
                'view_type' => 'grid_view',
                'page_title' => 'Employee Management',
                'page_title_description' => 'Manage All Employee Details',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Employee Management' => "",
                ],
            ]);
            $employees = Employee::all();
            return view('admin.employees.grid-view', compact('employees'));
        }
    }

    public function create()
    {
        if(Auth::check() == false || Auth::user()->role_id == 3){
            return redirect()->route('login');
        }
        else{
            $roles = RoleManager::all();
            $permissions = PermissionManager::all();
            $employeeRoles = EmployeeRole::all();
            $departments = Department::all();
            $users = User::all();
            return view('admin.employees.create', compact('roles', 'permissions', 'employeeRoles', 'departments', 'users'));
        }
    }

    public function filterDataByDesignation(Request $request)
    {
        $employees = Employee::where('designation_id', 'like', '%' . $request->designation_id . '%')->get();
        
        $htmlRow = view('admin.employees.loader.table_row', compact('employees'))->render();

        return response()->json([
            'status' => 200,
            'data' => $htmlRow,
        ]);
    }

    public function filterDataByEmpId(Request $request)
    {
        $employees = User::where('username', 'like', '%' . $request->employee_id . '%')->get();
        
        $htmlRow = view('admin.employees.loader.table_row', compact('employees'))->render();

        return response()->json([
            'status' => 200,
            'data' => $htmlRow,
        ]);
    }

    public function filterDataByDepartment(Request $request)
    {
        // return response()->json([
        //     'status' => 200,
        //     'data' => $request->all(),
        //     'message' => 'before query'
        // ]);
        $employees = Employee::where('department_id', $request->department_id)->get();

        $htmlRow = view('admin.employees.loader.table_row', compact('employees'))->render();

        return response()->json([
            'status' => 200,
            'data' => $htmlRow,
        ]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        
    }

    public function show(Employee $employee)
    {
        //
    }

    public function edit(Employee $employee)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $item = Employee::find($employee->id);

            $roles = RoleManager::all();
            $permissions = PermissionManager::all();
            $employeeRoles = EmployeeRole::all();
            $departments = Department::all();
            $users = User::all();

            if(!empty($item)){
                return view('admin.employees.edit', compact('item', 'roles', 'permissions', 'employeeRoles', 'departments', 'users'));
            }
            else{
                return redirect()->route('admin.employees.index')->with([
                    'message' => 'Employee not found',
                    'alert-type' => 'error',
                    'status' => 404
                ]);
            }
        }
    }

    public function update(Request $request, $employee)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            // get employee
            $item = Employee::where('id', $employee)->first();

            // dd($item, $request->all());

            $validated_data = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ], [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
            ]);

            if ($validated_data->fails()) {
                return redirect()->back()
                    ->withErrors($validated_data)
                    ->withInput();
            }
            else if(!empty($item)){
                // user data of employee
                $user = User::find($item->user_id);
                $name_array         = explode(' ', $request->name);
                $user->first_name   = (count($name_array) > 2) ? implode(' ', array_slice($name_array, 0, -1)) : $request->name;
                $user->last_name    = $name_array[count($name_array) - 1];
                $user->username     = (!empty($last_username)) ? $last_username + 1 : $request->username;
                $user->email        = $request->email;
                $user->phone        = $request->phone;
                $user->role_id      = $request->role_id;
                $user->blood_group  = $request->blood_group;
                $user->password     = bcrypt($request->password);
                $user->cspwdbycrt   = Crypt::encryptString($request->password);

                if ($request->hasFile('image')) {
                    // delete old image
                    if ($user->image != 'default.png' && $user->image != '') {
                        $old_image = public_path('storage/uploads/users/' . $user->image);
                        if (file_exists($old_image)) {
                            unlink($old_image);
                        }
                    }

                    $file = $request->file('image');
                    $filename = 'img_' . time() . '.' . $file->getClientOriginalExtension();
                    $location = public_path('storage/uploads/users/' . $filename);
                    Image::make($file)->save($location);
                    $user->image = $filename;
                }

                $user->update();

                $item->department_id    = intval($request->department_id);
                $item->designation_id   = intval($request->designation_id);
                $item->team_lead_id     = intval($request->team_lead_id);
                $item->monthly_salary   = $request->monthly_salary;
                $item->awards_won       = $request->awards_won;
                $item->joining_date     = $request->joining_date;
                $item->temporary_role   = $request->temporary_role;
                $item->update();
                
                return redirect()->route('admin.employees.index')->with([
                    'message' => 'Employee updated successfully',
                    'alert-type' => 'success',
                    'status' => 200
                ]);
            }
            else{
                return redirect()->route('admin.employees.index')->with([
                    'message' => 'Employee not found',
                    'alert-type' => 'error',
                    'status' => 404
                ]);
            }
        }
    }

    public function destroy($employee)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            // delete employee
            $item = Employee::find($employee);
            if(!empty($item)){
                // delete employee user_id from users table
                $user = User::find($item->user_id);
                $user->delete();
                $item->delete();
                return redirect()->route('admin.employees.index')->with([
                    'message' => 'Employee deleted successfully',
                    'alert-type' => 'success',
                    'status' => 200
                ]);
            }
            else{
                return redirect()->route('admin.employees.index')->with([
                    'message' => 'Employee not found',
                    'alert-type' => 'error',
                    'status' => 404
                ]);
            }
        }
    }
}
