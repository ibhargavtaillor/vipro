<?php

namespace App\Http\Controllers\admin;

use App\Company;
use App\CompanyPaymentTerms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * @description This function is used to load setting form
     */
    public function setting()
    {
        #check whether company as available or not
        $formUrl = "settings.company";
        $company = Company::where(['iAdminId' => Auth::guard('admin')->user()->id])->first();
        if (empty($company)) {
            $company = new Company;
        }

        #array to set data in view file
        $_data = array(
            "company" => $company,
            "formUrl" => $formUrl,
            'companyPaymentTerms' => CompanyPaymentTerms::where(['tiIsActive' => "1"])->orderByDesc('iCompanyTermId')->get(),
            "method" => "post",
        );

        return view('admin.settings', $_data);
    }

    /**
     * @param Request $request incoming request
     *
     * @description This function is used to save the compnay information
     */
    public function updateCompanyInfo(Request $request)
    {
        $data = $request->only(['vCompanyName', 'txAddress', 'vCompanyGstNumber', 'iSgst', 'iCgst']);
        $company = Company::where(['iAdminId' => Auth::guard('admin')->user()->id])->first();
        if (empty($company)) {
            $company = new Company;
        }
        $data['iAdminId'] = Auth::guard('admin')->user()->id;
        $company->fill($data);

        if ($company->save()) {
            session()->flash('success', "Company information has been saved successfully");
            return redirect(route("settings"));
        } else {
            return redirect(route("settings"))->withErrors("Something went wrong failed to update company informaton");
        }
    }

    /**
     * @param Request $request save company payment
     *
     * @description This function is used to save company payments
     */
    public function saveCompanyPaymentTerms(Request $request)
    {
        $data = $request->only(['vTitle']);
        $company = Company::where(['iAdminId' => Auth::guard('admin')->user()->id])->first();
        $data['iAdminId'] = $company->iCompanyMasterId;

        $model = new CompanyPaymentTerms;

        if ($request->has('iCompanyTermId')) {
            $model = CompanyPaymentTerms::where(['iCompanyTermId'=>$request->input('iCompanyTermId')])->first();
        }

        $model->fill($data);
        if ($model->save()) {
            session()->flash('success', "Company Payment Terms has been saved successfully");
            return redirect(route("settings"));
        } else {
            return redirect(route("settings"))->withErrors("Something went wrong failed to update company payment Terms");
        }
    }
}
