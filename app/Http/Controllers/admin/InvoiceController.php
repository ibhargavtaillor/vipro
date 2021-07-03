<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Company;
use App\CompanyBankDetail;
use App\CompanyConditions;
use App\CompanyPaymentTerms;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\In;

class InvoiceController extends Controller
{
    /**
     * @description This function is used to add new invoice
     */
    public function create()
    {
        $_data = array(
            'clients' => Client::getAll(),
            "invoiceNumber" => Invoice::generateNextInvoiceNumber(),
            "company" => Company::info(),
            "companyBank" => CompanyBankDetail::getAll(),
            'items' => Items::getAll(),
            'conditions' => CompanyConditions::getAll(),
            'paymentTerms' => CompanyPaymentTerms::getAll(),
        );
        return view('admin.invoice.add', $_data);
    }

    /**
     * @description This function is used to store invoice information
     */
    public function store(Request $request)
    {
        $params = $request->all();
        #dd($params);
        if ($request->has('iClientMasterId') && $params['iClientMasterId'] != "") {

            $newInvoiceModel = new Invoice;

            $company = Company::where(['iAdminId' => Auth::guard("admin")->user()->id])->first();
            $client = Client::where(['iClientMasterId' => $params['iClientMasterId']])->first();
            $paymentTerms = CompanyPaymentTerms::where(['iCompanyTermId' => $params['vPaymentTerms']])->first();
            $condition = CompanyConditions::where(['iCompanyContidionId' => $params['txTermsAndCondition']])->first();
            $companyBank = CompanyBankDetail::where(['iCompanyBankDetailId' => $params['txBankDetail']])->first();

            $invoiceData = array(
                "vInvoiceNumber" => Invoice::generateNextInvoiceNumber(),
                "vUrlKey" => (String) Str::uuid(),
                "iClientMasterId" => $client->iClientMasterId,
                "vClientName" => $client->vClientName,
                "dInvoiceDate" => $params['dInvoiceDate'],
                "vPaymentTerms" => $paymentTerms->vTitle,
                "txTermsAndCondition" => $condition->txCondition,
                "txBankDetail" => $companyBank->txBankInfo,
                "dGrossTotal" => $params['dGrossTotal'],
                "dCarting" => $params['dCarting'],
                "dTotal" => $params['dTotal'],
                "dSGSTPerc" => $company->iSgst,
                "dSGST" => $params['dSGST'],
                "dCGSTPerc" => $company->iCgst,
                "dCGST" => $params['dCGST'],
                "dIGSTPerc"=>$company->iIgst,
                "dIGST" => $params['dIGST'],
                "tiIsOutOfState" => $params['tiIsOutOfState'],
                "dRoundOff" => (isset($params['dRoundOff']) && $params['dRoundOff'] != "") ? $params['dRoundOff'] : "0",
                "dGrandTotal" => $params['dGrandTotal'],
            );

            $newInvoiceModel->fill($invoiceData);

            if ($newInvoiceModel->save()) {
                if ($request->has('invoiceItem') && is_array($params['invoiceItem']) && !empty($params['invoiceItem'])) {
                    $invoiceItem = [];
                    foreach ($params['invoiceItem'] as $item) {
                        $dbItem = Items::where(['iItemMasterId' => $item['vItemTitle']])->first();
                        $newInvoiceModel->items()->create(array(
                            'vItemTitle' => $dbItem->vTitle,
                            'vHSN' => (isset($item['vHSN'])) ? $item['vHSN'] : "",
                            'iQty' => $item['iQty'],
                            'dRate' => $dbItem->dcPrice,
                            'dAmount' => $item['dAmount'],
                        ));
                    }
                }
                return redirect(route('invoice.print',['vUrlKey'=>$newInvoiceModel->vUrlKey]));
            }

        } else {
            return redirect(route('invoice.create'))->withErrors("Please select Client");
        }
    }

    /**
     * @param Request $request incoming request
     *
     * @description This function is used to view invoice detail
     */
    public function invoiceDetail(Request $request, $vUrlKey)
    {
        if (isset($vUrlKey) && $vUrlKey != "") {
            $invoice = Invoice::where(['vUrlKey' => $vUrlKey])->first();
            $data = array(
                "invoice" => $invoice,
            );
            return view("admin.invoice.print-invoice", $data);
        } else {
            return back();
        }
    }
}
