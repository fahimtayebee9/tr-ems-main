<?php
namespace App\Http\Controllers\Admin;

use App\Models\CompanyPolicy;
use App\Models\CompanyDetail;
use App\Http\Requests\StoreCompanyPolicyRequest;
use App\Http\Requests\UpdateCompanyPolicyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class CompanyPolicyController extends Controller
{
    public function index()
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'company_policy',
                    'page_title' => 'Company Policy',
                    'page_title_description' => 'Manage Company Policy & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Company Policy' => route('company-policy.index'),
                    ],
                ]
            );
            $company_policy = CompanyPolicy::first();
            $company_details = CompanyDetail::first();

            return view('admin.company-policy.index', compact('company_policy', 'company_details'));
        }
    }

    public function show(CompanyPolicy $companyPolicy){
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            return redirect()->route('company-policy.index', $companyPolicy);
        }
    }

    public function edit(CompanyPolicy $companyPolicy)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'company_policy',
                    'page_title' => 'Company Policy',
                    'page_title_description' => 'Manage Company Policy & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Company Policy' => route('company-policy.index'),
                        'Edit' => route('company-policy.edit', $companyPolicy->id),
                    ],
                ]
            );
            $company_policy = CompanyPolicy::first();
            
            return view('admin.company-policy.edit', compact('company_policy'));
        }
    }

    public function update(UpdateCompanyPolicyRequest $request, CompanyPolicy $companyPolicy)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $company_policy = CompanyPolicy::first();
            $company_policy->update($request->all());
            return redirect()->route('company-policy.index')->with('success', 'Company Policy updated successfully');
        }
    }
    
    public function destroy(CompanyPolicy $companyPolicy)
    {
        //
    }

    /*
    * Single AJAX Request Responses
    */
    public function updateAttendanceRule(Request $request){
        $company_policy = CompanyPolicy::first();
        $company_policy->late_attendance_rule = $request->new_rule;
        $company_policy->update();

        return response()->json([
            'success' => true,
            'message' => 'Attendance Rule Updated Successfully',
        ]);
    }
}
