<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    /**
     * @description This function is used to add new invoice
     */
    public function create()
    {
        return view('admin.invoice.add');
    }
}
