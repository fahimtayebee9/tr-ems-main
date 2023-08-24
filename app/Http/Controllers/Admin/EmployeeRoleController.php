<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmployeeRole;
use App\Http\Requests\StoreEmployeeRoleRequest;
use App\Http\Requests\UpdateEmployeeRoleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DesignationImport;
use Illuminate\Http\Request;

class EmployeeRoleController extends Controller
{
    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'designations',
                    'page_title' => 'Designations',
                    'page_title_description' => 'Manage Designations & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Designations' => route('designations.index'),
                    ],
                ]
            );

            $employeeRoles = EmployeeRole::all();
            return view('admin.employees.emp-roles', compact('employeeRoles'));
        }
    }

    public function store(StoreEmployeeRoleRequest $request)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), $request->rules(), $request->messages());

            if ($validated_data->fails()) {
                return redirect()->back()->withErrors($validated_data->errors());
            }

            $employeeRole = new EmployeeRole();
            $employeeRole->name = $request->name;
            $employeeRole->description = $request->description;
            $employeeRole->status = $request->status;
            $employeeRole->slug = Str::slug($request->name);
            $employeeRole->save();

            return redirect()->back()->with('success', 'Employee Role created successfully');
        }
    }

    public function update(UpdateEmployeeRoleRequest $request, $employeeRole)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), $request->rules(), $request->messages());
            $employeeRole = EmployeeRole::find($employeeRole);

            if ($validated_data->fails()) {
                return redirect()->back()->withErrors($validated_data->errors());
            }
            else if (!$employeeRole) {
                return redirect()->back()->withErrors('Employee Role not found');
            }

            $employeeRole->name = $request->name;
            $employeeRole->description = $request->description;
            $employeeRole->status = $request->status;
            $employeeRole->slug = Str::slug($request->name);
            $employeeRole->update();

            return redirect()->back()->with('success', 'Employee Role updated successfully');
        }
    }

    public function destroy($employeeRole)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $employeeRole = EmployeeRole::find($employeeRole);

            if (!$employeeRole) {
                return redirect()->back()->withErrors('Employee Role not found');
            }
            else if ($employeeRole->employees()->count() > 0) {
                return redirect()->back()->withErrors('Employee Role cannot be deleted because it is assigned to one or more employees');
            }

            $employeeRole->delete();

            return redirect()->back()->with('success', 'Employee Role deleted successfully');
        }
    }

    public function importBulk(Request $request){
        // check if user is logged in
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            if($request->hasFile('bulk_data')){
                Excel::import(new DesignationImport, $request->file('bulk_data'));

                return redirect()->back()->with([
                    'message' => 'Bulk Roles Imported Successfully',
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
}
