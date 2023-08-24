<?php

namespace App\Http\Controllers\Admin;

use App\Models\CompanyDetail;
use App\Http\Requests\StoreCompanyDetailRequest;
use App\Http\Requests\UpdateCompanyDetailRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Auth;

class CompanyDetailController extends Controller
{
    public function update(Request $request, $companyDetail)
    {
        if(Auth::check() == false || Auth::user()->role_id == 5){
            return redirect()->route('login');
        }
        else{
            $companyDetail = CompanyDetail::find($companyDetail);

            if(!empty($companyDetail)){
                $companyDetail->company_name = $request->company_name;
                $companyDetail->company_address = $request->company_address;
                $companyDetail->company_phone = $request->company_phone;
                $companyDetail->company_email = $request->company_email;
                $companyDetail->company_website = $request->company_website;

                if ($request->hasFile('company_logo')) {
                    // delete old image
                    if ($companyDetail->image != 'default.png' && $companyDetail->image != '') {
                        $old_image = public_path('storage/uploads/company/' . $companyDetail->image);
                        if (file_exists($old_image)) {
                            unlink($old_image);
                        }
                    }
                    $file = $request->file('company_logo');
                    $filename = 'img_' . time() . '.' . $file->getClientOriginalExtension();
                    $location = public_path('storage/uploads/company/' . $filename);
                    Image::make($file)->save($location);
                    $companyDetail->company_logo = $filename;
                }

                $companyDetail->update();

                return redirect()->route('company-policy.index')->with('success', 'Company Detail Updated Successfully');
            }

            return redirect()->route('company-policy.index')->with('error', 'Company Detail Not Updated');
        }
    }

}
