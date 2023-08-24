<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ComputerConfiguration;
use App\Models\AccessoriesRequestItem;
use App\Models\AccessoriesItem;
use App\Models\AccessoriesRequest;
use App\Models\Employee;

class PcConfigurationController extends Controller
{
    public function index(){
        if(ComputerConfiguration::where('employee_id', auth()->user()->employee()->first()->id)->first()){
            session([
                'menu_active' => 'pc_configurations',
                'page_title' => 'Computer Configurations',
                'page_title_description' => 'Manage Computer Configurations',
                'breadcrumb' => [
                    ["name" => "Home", "link" => route('employee.dashboard') ],
                    ["name" => "Computer Configurations", "link" => ""]
                ],
            ]);
    
            $pc_configuration = ComputerConfiguration::where('employee_id', auth()->user()->employee()->first()->id)->first();
            return view('employee.pages.pc_configurations.index', compact('pc_configuration'));
        }
        else{
            return $this->create();
        }
    }

    public function create(){
        session([
            'menu_active' => 'pc_configurations',
            'page_title' => 'Computer Configurations',
            'page_title_description' => 'Manage Computer Configurations',
            'breadcrumb' => [
                ["name" => "Home", "link" => route('employee.dashboard') ],
                ["name" => "Computer Configurations", "link" => route('employee.computer-configurations.index')],
                ["name" => "New Configuration", "link" => ""],
            ],
        ]);
        $employee = Employee::where('user_id', auth()->user()->id)->first();
        $pc_configuration = ComputerConfiguration::where('employee_id', auth()->user()->id)->first();
        return view('employee.pages.pc_configurations.create', compact('pc_configuration', 'employee'));
    }

    public function store(Request $request){
        $validated_data = Validator::make($request->all(), [
            'processor' => 'required',
            'motherboard' => 'required',
            'ram' => 'required',
            'monitor' => 'required',
        ]);

        $pc_configuration = ComputerConfiguration::where('employee_id', auth()->user()->id)->first();

        if($pc_configuration){
            $pc_configuration->update($request->all());
        }else{
            $request->merge(['employee_id' => auth()->user()->employee()->first()->id]);
            ComputerConfiguration::create($request->all());
        }

        return redirect()->route('employee.computer-configurations.index')->with('success', 'Computer Configuration has been updated successfully');
    }

    public function update(Request $request){
        $validated_data = Validator::make($request->all(), [
            'processor' => 'required',
            'motherboard' => 'required',
            'ram' => 'required',
            'monitor' => 'required',
        ]);

        if($validated_data->fails()){
            return redirect()->back()->withErrors($validated_data)->withInput();
        }
        else{
            $pc_configuration = ComputerConfiguration::where('employee_id', auth()->user()->id)->first();
            $pc_configuration->update($request->all());
            return redirect()->route('employee.computer-configurations.index')->with([
                'icon' => 'success',
                'message' => 'Computer Configuration has been updated successfully',
                'status' => 200
            ]);
        }
    }

    public function requestAccessories(){
        session([
            'menu_active' => 'pc_configurations',
            'page_title' => 'Computer Configurations',
            'page_title_description' => 'Manage Computer Configurations',
            'breadcrumb' => [
                'Home' => route('employee.dashboard'),
                'Computer Configurations' => route('employee.computer-configurations.index'),
                'Request Accessories' => "",
            ],
        ]);

        $pc_configuration = ComputerConfiguration::where('employee_id', auth()->user()->id)->first();
        return view('employee.pages.pc_configurations.request', compact('pc_configuration'));
    }

    public function requestAccessoriesStore(Request $request){
        $validated_data = Validator::make($request->all(), [
            'accessories' => 'required',
        ]);

        if($validated_data->fails()){
            return redirect()->back()->withErrors($validated_data)->withInput();
        }
        else{
            $requestObject = new AccessoriesRequest();
            $requestObject->employee_id = auth()->user()->id;
            $requestObject->request_date = date('Y-m-d');
            $requestObject->save();

            $count = count($request->accessories);
            for($i = 0; $i < $count; $i++){
                $accessoryRequestItem = new AccessoriesRequestItem();
                $accessoryRequestItem->accessory_id = $request->accessories[$i];
                $accessoryRequestItem->accessories_request_id = $requestObject->id;
                $accessoryRequestItem->issue = $request->issues[$i];
                $accessoryRequestItem->status = 'pending';
                $accessoryRequestItem->save();
            }

            return redirect()->route('employee.computer-configurations.index')->with([
                'icon' => 'success',
                'message' => 'Accessories Request has been sent to Admin Successfully',
                'status' => 200
            ]);
        }
    }
}
