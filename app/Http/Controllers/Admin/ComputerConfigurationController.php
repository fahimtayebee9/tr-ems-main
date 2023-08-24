<?php

namespace App\Http\Controllers\Admin;

use App\Models\ComputerConfiguration;
use App\Models\AccessoriesRequest;
use App\Models\AccessoriesRequestItem;
use App\Models\Employee;
use App\Http\Requests\StoreComputerConfigurationRequest;
use App\Http\Requests\UpdateComputerConfigurationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComputerConfigurationController extends Controller
{
    public function requests(){
        session([
            'menu_active' => 'pc_configurations_requests',
            'page_title' => 'Accessories Requests',
            'page_title_description' => 'Manage Computer Accessories Requests',
            'breadcrumb' => [
                'Home' => route('admin.dashboard'),
                'Accessories Requests' => "",
            ],
        ]);

        $list_of_requests = AccessoriesRequest::all();
        return view('admin.accessories-requests.index', compact('list_of_requests'));
    }

    public function updateAccessoryRequest(Request $request){
        $validated_data = Validator::make($request->all(), [
            'request_id' => 'required',
            'status' => 'required',
        ]);

        if($validated_data->fails()){
            return ; //redirect()->back()->withErrors($validated_data)->withInput();
        }
        else{
            $requestItem = AccessoriesRequestItem::find($request->request_id);
            $requestItem->status = $request->status;
            $requestItem->save();

            return response()->json([
                'icon' => 'success',
                'message' => 'Request Updated Successfully',
                'status' => 200
            ]);
        }
    }

    public function index()
    {
        session([
            'menu_active' => 'pc_configurations',
            'page_title' => 'Employee\'s Computer Configurations',
            'page_title_description' => 'Manage Computer Configurations for Employees',
            'breadcrumb' => [
                'Home' => route('admin.dashboard'),
                'Computer Configurations' => "",
            ],
        ]);
        $list_of_configurations = ComputerConfiguration::all();
        return view('admin.pc_configurations.index', compact('list_of_configurations'));
    }

    public function create()
    {
        session([
            'menu_active' => 'pc_configurations_create',
            'page_title' => 'Add Computer Configurations',
            'page_title_description' => 'Add new configuration for employee\'s computer',
            'breadcrumb' => [
                'Home' => route('admin.dashboard'),
                'Computer Configurations' => route('admin.computer-configurations.index'),
                'Create' => '',
            ],
        ]);
        
        $employees = Employee::all();
        return view('admin.pc_configurations.create', compact('employees'));   
    }

    public function store(Request $request)
    {
        $validated_data = Validator::make($request->all(), [
            'employee_id' => 'required',
        ]);

        if($validated_data->fails()){
            return redirect()->back()->withErrors($validated_data)->withInput();
        }
        else{
            $newConfiguration = new ComputerConfiguration();
            $newConfiguration->employee_id  = $request->employee_id;
            $newConfiguration->processor    = ($request->processor == null) ? 'Unknown' :$request->processor;
            $newConfiguration->motherboard  = ($request->motherboard == null) ? 'Unknown' :$request->motherboard;
            $newConfiguration->ram          = ($request->ram == null) ? 'Unknown' :$request->ram;
            $newConfiguration->power_supply = ($request->power_supply == null) ? 'Unknown' :$request->power_supply;
            $newConfiguration->graphics_card= ($request->graphics_card == null) ? '-' :$request->graphics_card;
            $newConfiguration->hard_disk    = ($request->hard_disk == null) ? 'Unknown' :$request->hard_disk;
            $newConfiguration->ssd          = ($request->ssd == null) ? 'Unknown' :$request->ssd;
            $newConfiguration->keyboard     = ($request->keyboard == null) ? 'Unknown' :$request->keyboard;
            $newConfiguration->mouse        = ($request->mouse == null) ? 'Unknown' :$request->mouse;
            $newConfiguration->ups          = ($request->ups == null) ? 'Unknown' :$request->ups;
            $newConfiguration->monitor      = ($request->monitor  == null) ? 'Unknown' :$request->monitor ;
            $newConfiguration->headphone    = ($request->headphone== null) ? 'Unknown' :$request->headphone;
            $newConfiguration->casing       = ($request->casing == null) ? 'Unknown' : $request->casing;
            $newConfiguration->mouse_pad    = ($request->mouse_pad == null) ? 'Unknown' :$request->mouse_pad;
            $newConfiguration->save();

            return redirect()->route('admin.computer-configurations.index')->with('success', 'New Configuration Added Successfully');
        }
    }

    public function show(ComputerConfiguration $computerConfiguration)
    {
        //
    }

    public function edit(ComputerConfiguration $computerConfiguration)
    {
        //
    }

    public function update(UpdateComputerConfigurationRequest $request, ComputerConfiguration $computerConfiguration)
    {
        //
    }

    public function destroy(ComputerConfiguration $computerConfiguration)
    {
        
    }
}
