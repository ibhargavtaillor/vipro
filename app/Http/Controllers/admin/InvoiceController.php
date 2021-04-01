<?php

namespace App\Http\Controllers\admin;

use App\Client;
use App\Company;
use App\CompanyBankDetail;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Items;

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
        );

        return view('admin.invoice.add', $_data);
    }
}
