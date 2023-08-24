<?php

namespace App\Http\Controllers;

use App\Models\RoleManager;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\AccountManager;
use App\Models\ClientAccount;
use App\Models\Department;
use App\Models\EmployeeRole;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Exports\UserTemplateExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeeImport;

class UserController extends Controller
{
    public function exportUserTemplate(){
        $designationList    = EmployeeRole::all()->pluck('name')->toArray();
        $departmentList     = Department::all()->pluck('name')->toArray();
        $roleList           = RoleManager::all()->pluck('name')->toArray();
        $accountList        = ClientAccount::all()->pluck('account_name')->toArray();
        $userList           = User::all()->pluck(['first_name','last_name'])->toArray();
        $employeeList       = Employee::all()->pluck('employee_id')->toArray();

        // dd($userList, $employeeList, $accountList, $roleList, $departmentList, $designationList);

        return Excel::download(new UserTemplateExport, 'Bulk-Users_Template.xlsx');
    }

    public function importBulk(Request $request){
        // check if user is logged in
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            if($request->hasFile('bulk_data')){
                Excel::import(new UsersImport, $request->file('bulk_data'));
                // $all_users = User::all();
                // Excel::import(new EmployeeImport($all_users), $request->file('bulk_data'));

                return redirect()->back()->with([
                    'message' => 'Bulk Users Imported Successfully',
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
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'administrative_users',
                    'page_title' => 'Administrative Users',
                    'page_title_description' => 'Manage Administrative Users & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Administrative Users' => route('administration.index'),
                    ],
                ]
            );

            $users = User::where('role_id', '!=', RoleManager::where('name', 'Employee')->first()->id)->get();
            return view('admin.administration.index', compact('users'));
        }
    }

    public function create()
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            return view('admin.administration.create');
        }
    }

    public function store(Request $request)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ], [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
            ]);

            if ($validated_data->fails()) {
                return redirect()->back()
                    ->withErrors($validated_data)
                    ->withInput();
            }

            // get last user id
            $last_username = User::orderBy('id', 'desc')->first()->username;

            $user_full_name = explode(' ', trim($request->name));
            $first_name = null;
            $last_name = null;
            if(count($user_full_name) > 2) {
                $first_name = $user_full_name[0] . ' ' . $user_full_name[1];
                $last_name = $user_full_name[2];
            } else if(count($user_full_name) > 1) {
                $first_name = $user_full_name[0];
                $last_name = $user_full_name[1];
            } else {
                $first_name = $user_full_name[0];
                $last_name = '';
            }
            
            $user               = new User();
            $user->first_name   = $first_name;
            $user->last_name    = $last_name;
            $user->username     = (!empty($last_username) && !is_string($last_username)) ? $last_username + 1 : $request->username;
            $user->email        = $request->email;
            $user->phone        = $request->phone;
            $user->role_id      = $request->role_id;
            $user->blood_group  = $request->blood_group;
            $user->password     = bcrypt($request->password);
            $user->cspwdbycrt   = Crypt::encryptString($request->password);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = 'img_' . time() . '.' . $file->getClientOriginalExtension();
                $location = public_path('storage/uploads/users/' . $filename);
                Image::make($file)->save($location);
                $user->image = $filename;
            }

            $user->save();

            // create employee record if role is not super admnin
            if ($request->role_id != RoleManager::where('name', 'Super Admin')->first()->id) {
                $employee                   = new Employee();
                $employee->user_id          = $user->id;
                $employee->employee_id      = $user->username;
                $employee->department_id    = $request->department_id;
                $employee->designation_id   = $request->designation_id;
                $employee->team_lead_id     = $request->team_lead_id;
                $employee->monthly_salary   = $request->monthly_salary;
                $employee->awards_won       = $request->awards_won;
                $employee->joining_date     = $request->joining_date;
                $employee->save();

                // add employee id to attendance table
                $attendance = new Attendance();
                $attendance->employee_id = $employee->id;
                $attendance->save();

                return redirect()->route('administration.index')->with([
                    'success' => 'User has been created with employee details successfully.',
                    'type' => 'success',
                ]);
            }

            return redirect()->back()->with([
                'success' => 'User has been created successfully.',
                'type' => 'success',
            ]);
        }
    }

    // public function to get the username
    public function getUserName(Request $request)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $username = User::orderBy('id', 'desc')->first()->username;
            return response()->json(['username' => $username, 'status' => 200, 'message' => 'success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        try {
                $decrypted = Crypt::decrypt($encrypted);
            } catch (DecryptException $e) {
                $e->getMessage();
                info("Error....!!");
            }
        
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $userInfo = User::find($id);

            if($userInfo->role_id != RoleManager::where('name', 'Super Admin')->first()->id){
                $employeeInfo = Employee::where('user_id', $id)->first();
                return view('admin.administration.edit', compact('userInfo', 'employeeInfo'));
            }

            return view('admin.administration.edit', compact('userInfo'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'administrative_users',
                    'page_title' => 'Administrative Users',
                    'page_title_description' => 'Manage Administrative Users & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Administrative Users' => route('administration.index'),
                    ],
                ]
            );
            $validated_data = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
            ], [
                'name.required' => 'Name is required',
            ]);

            $user = User::find($id);

            if ($validated_data->fails()) {
                return redirect()->back()
                    ->withErrors($validated_data)
                    ->withInput();
            }
            else if(!empty($user)){
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

                // create employee record if role is not super admnin
                if ($request->role_id != RoleManager::where('name', 'Super Admin')->first()->id) {
                    $employee                   = new Employee();
                    $employee->user_id          = $user->id;
                    $employee->employee_id      = $user->username;
                    $employee->department_id    = $request->department_id;
                    $employee->designation_id   = $request->designation_id;
                    $employee->team_lead_id     = $request->team_lead_id;
                    $employee->monthly_salary   = $request->monthly_salary;
                    $employee->awards_won       = $request->awards_won;
                    $employee->joining_date     = $request->joining_date;
                    $employee->update();

                    return redirect()->route('administration.index')->with([
                        'success' => 'User has been created with employee details successfully.',
                        'type' => 'success',
                    ]);
                }
        
                return redirect()->back()->with([
                    'success' => 'User has been Updated successfully.',
                    'type' => 'success',
                ]);
            }
            else{
                return redirect()->back()->with([
                    'success' => 'User not found.',
                    'type' => 'danger',
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $user = User::find($id);

            $tables = DB::select('SHOW TABLES');
            $tableNames = array_map(function($table) {
                return $table->Tables_in_database_name;
            }, $tables);

            foreach ($tableNames as $table) {
                $tabledata = DB::table($table)->where('user_id', $id)->first();
                if(!empty($tabledata)){
                    return redirect()->route('administration.index')->with([
                        'success' => 'User has been used in other table.',
                        'type' => 'danger',
                    ]);
                }
            }

            if(!empty($user)){
                if(!empty($user->image) && file_exists(public_path('storage/uploads/users/' . $user->image))){
                    unlink(public_path('storage/uploads/users/' . $user->image));
                }
                $user->delete();
                return redirect()->route('administration.index')->with([
                    'success' => 'User has been deleted successfully.',
                    'type' => 'success',
                ]);
            }
            else{
                return redirect()->route('administration.index')->with([
                    'success' => 'User not found.',
                    'type' => 'danger',
                ]);
            }
        }
    }
}
