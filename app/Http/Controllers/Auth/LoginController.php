<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\RoleManager;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $reqest){
        $input_val = $reqest->all();

        $this->validate($reqest, [
            'username' => 'required',
            'password' => 'required'
        ]);
        $remember = $reqest->has('remember') ? true : false;

        if(auth()->attempt(array('username' => $input_val['username'], 'password' => $input_val['password']), $remember)){
            // dd(RoleManager::where('id',auth()->user()->role_id)->first(), auth()->user()->first_name, auth()->user()->role_id);
            if (RoleManager::where('id',auth()->user()->role_id)->first()->slug == 'admin' || RoleManager::where('id',auth()->user()->role_id)->first()->slug == 'super-admin') {
                return redirect()->route('admin.dashboard');
            }elseif(RoleManager::where('id',auth()->user()->role_id)->first()->slug == 'employee'){
                return redirect()->route('employee.dashboard');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Username & Password are incorrect.');
        }
    }
}
