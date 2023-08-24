<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DepartmentImport;

class DepartmentController extends Controller
{
    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'departments',
                    'page_title' => 'Departments',
                    'page_title_description' => 'Manage Departments & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Departments' => route('departments.index'),
                    ],
                ]
            );

            $departments = Department::all();
            return view('admin.settings.department', compact('departments'));
        }
    }

    public function store(StoreDepartmentRequest $request)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',
                'status' => 'nullable',
            ], [
                'name.required' => 'Department name is required',
                'name.string' => 'Department name must be a string',
                'name.max' => 'Department name must not be greater than 255 characters',
                'description.string' => 'Department description must be a string',
                'description.max' => 'Department description must not be greater than 255 characters',
                'status.required' => 'Department status is required',
            ]);

            if($validated_data->fails()){
                dd($validated_data->errors(), $validated_data->messages(), $validated_data->failed());
                return redirect()->back()->withErrors($validated_data->errors());
            }

            $department                 = new Department();
            $department->name           = $request->name;
            $department->description    = $request->description;
            $department->status         = $request->status;
            $department->slug           = Str::slug($request->name);
            $department->save();
            
            return redirect()->back()->with('success', 'Department created successfully');
        }
        
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), $request->rules(), $request->messages());

            if($validated_data->fails()){
                $department->name           = $request->name;
                $department->description    = $request->description;
                $department->status         = $request->status;
                $department->slug           = Str::slug($request->name);
                $department->update();
                return redirect()->back()->with(['success' => 'Department updated successfully', 'status' => 200]);
            }
            
            return redirect()->back()->with(['error' => 'Department not Updated', 'status' => 404]);
        }
    }

    public function destroy($id)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $has_data = Department::find($id)->employees()->exists();
            
            if($has_data){
                return response()->json(['error' => 'Department has employees', 'status' => 400]);
            }
            else{
                $department = Department::find($id);
                $department->delete();
                return response()->json(['success' => 'Department deleted successfully', 'status' => 200]);
            }
        }
    }

    public function importBulk(Request $request){
        // check if user is logged in
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            if($request->hasFile('bulk_data')){
                Excel::import(new DepartmentImport, $request->file('bulk_data'));

                return redirect()->back()->with([
                    'message' => 'Bulk Departments Imported Successfully',
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
