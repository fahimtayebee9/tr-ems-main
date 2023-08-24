<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClientAccount;
use App\Http\Requests\StoreClientAccountRequest;
use App\Http\Requests\UpdateClientAccountRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClientAccountImport;
use App\Models\AccountManager;

class ClientAccountController extends Controller
{
    public function assignAccountManager(Request $request){
        // check if user is logged in
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            // dd($request->all());
            // loop through the array of caccounts and assign them to the employee
            foreach($request->caccounts as $caccount){
                $account_manager = new AccountManager();
                $account_manager->user_id = $request->user_id;
                $account_manager->account_id = $caccount;
                $account_manager->save();
            }

            return redirect()->back()->with([
                'message' => 'Account Manager Assigned Successfully',
                'alert-type' => 'success'
            ]);
        }
    }

    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'client_accounts',
                    'page_title' => 'Client Accounts',
                    'page_title_description' => 'Manage Client Accounts & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Client Accounts' => '',
                    ],
                ]
            );

            $listItems = ClientAccount::all();
            return view('admin.administration.clients-index', compact('listItems'));
        }
    }

    public function store(StoreClientAccountRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'account_name' => 'required|unique:client_accounts,account_name',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $client_account = new ClientAccount();
        $client_account->account_name = $request->account_name;
        $client_account->marketplace = $request->marketplace;
        $client_account->status = $request->status;
        $client_account->save();

        return redirect()->back()->with([
            'message' => 'Client Account Created Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy(ClientAccount $clientAccount)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            // check if client account has any existing childs (relationships) in other tables
            $existing_relationships = $clientAccount->clientAccountRelationships()->count();
        
            if($existing_relationships > 0){
                return redirect()->back()->with([
                    'message' => 'Client Account has existing relationships and cannot be deleted',
                    'alert-type' => 'error'
                ]);
            }
            if($existing_relationships > 0){
                return redirect()->back()->with([
                    'message' => 'Client Account has existing relationships and cannot be deleted',
                    'alert-type' => 'error'
                ]);
            }

            $clientAccount->delete();
            return redirect()->back()->with([
                'message' => 'Client Account Deleted Successfully',
                'alert-type' => 'success'
            ]);
        }
    }

    public function importBulkAccounts(Request $request){
        // check if user is logged in
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            if($request->hasFile('bulk_accounts')){
                Excel::import(new ClientAccountImport, $request->file('bulk_accounts'));

                return redirect()->back()->with([
                    'message' => 'Bulk Accounts Imported Successfully',
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
