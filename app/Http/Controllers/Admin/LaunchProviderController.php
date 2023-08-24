<?php

namespace App\Http\Controllers\Admin;

use App\Models\LaunchProvider;
use App\Http\Requests\StoreLaunchProvideRequest;
use App\Http\Requests\UpdateLaunchProvideRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LaunchProviderController extends Controller
{
    public function index()
    {
        if(Auth::user()->role->slug == 'admin' || Auth::user()->role->slug == 'super-admin') {
            session([
                'menu_active' => 'launch-provider-all',
                'page_title' => 'Launch Provider Manager',
                'page_title_description' => 'Manage all launch providers in one place',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Launch Providers' => '',
                ],
            ]);

            $launchProviderList = LaunchProvider::all();
            return view('admin.launch-sheet.provider-index', compact('launchProviderList'));
        }
        else{
            return redirect()->route('login');
        }
    }

    public function create()
    {
        //
    }

    public function store(StoreLaunchProvideRequest $request)
    {
        if(Auth::user()->role->slug == 'admin' || Auth::user()->role->slug == 'super-admin') {
            $validated = Validator::make($request->all(), [
                'name' => 'required|unique:launch_providers',
                'unit_price' => 'required',
                'vehicle_cost' => 'required',
            ]);

            if ($validated->fails()) {
                return redirect()->back()->withErrors($validated)->withInput()->with([
                    'message' => 'Launch provider already exists',
                    'alert-type' => 'error'
                ]);
            }

            $launchProvider = new LaunchProvider();
            $launchProvider->name = $request->name;
            $launchProvider->slug = Str::slug($request->name);
            $launchProvider->address = $request->address;
            $launchProvider->phone = $request->phone;
            $launchProvider->email = $request->email;
            $launchProvider->unit_price = $request->unit_price;
            $launchProvider->vehicle_cost = $request->vehicle_cost;
            $launchProvider->contact_person = $request->contact_person;
            $launchProvider->contact_person_phone = $request->contact_person_phone;
            $launchProvider->status = $request->status;
            $launchProvider->save();

            return redirect()->route('admin.launch-provider-management.index')->with([
                'message' => 'Launch provider created successfully',
                'alert-type' => 'success'
            ]);
        }
        else{
            return redirect()->route('login')->with([
                'message' => 'You are not authorized to access this page',
                'alert-type' => 'error'
            ]);
        }
    }

    public function update(UpdateLaunchProvideRequest $request, LaunchProvide $launchProvide)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|unique:launch_providers',
            'unit_price' => 'required',
            'vehicle_cost' => 'required',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput()->with([
                'message' => 'Launch provider already exists',
                'alert-type' => 'error'
            ]);
        }

        $launchProvider = LaunchProvider::find($launchProvide->id);
        $launchProvider->name = $request->name;
        $launchProvider->slug = Str::slug($request->name);
        $launchProvider->address = $request->address;
        $launchProvider->phone = $request->phone;
        $launchProvider->email = $request->email;
        $launchProvider->unit_price = $request->unit_price;
        $launchProvider->vehicle_cost = $request->vehicle_cost;
        $launchProvider->contact_person = $request->contact_person;
        $launchProvider->contact_person_phone = $request->contact_person_phone;
        $launchProvider->status = $request->status;
        $launchProvider->update();

        return redirect()->route('admin.launch-provider-management.index')->with([
            'message' => 'Launch provider updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(LaunchProvide $launchProvide)
    {
        $launchProvider = LaunchProvider::find($launchProvide->id);
        $launchProvider->delete();

        return redirect()->route('admin.launch-provider-management.index')->with([
            'message' => 'Launch provider deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
