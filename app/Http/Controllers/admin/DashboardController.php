<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Invoice;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DashboardController extends Controller
{
    /**
     * load index page
     */
    public function dashboard()
    {
        return view('admin.index');
    }

    /**
     * @param Request $request incoming request
     *
     * @description This function is used to load invoice list
     */
    public function getInvoices(Request $request)
    {
        #code to check whether request is ajax or not
        if ($request->ajax()) {
            return Datatables::of(Invoice::query()->orderBy('iInvoiceMasterId', 'desc'))
                ->addIndexColumn()
                ->addColumn("tiIsPaid", function ($row) {
                    $html = "";
                    if ($row->tiIsPaid == "1") {
                        $html = "<span class='badge badge-success' >Paid</span>";
                    } else {
                        $html = "<span class='badge badge-warning' >Pending</span>";
                    }
                    return $html;
                })
                ->addColumn('action', function ($row) {
                    $html = "";
                    $viewUrl = route('invoice.print', ['vUrlKey' => $row->vUrlKey]);
                    $html .= '<a title="View" href="' . $viewUrl . '" class="btn btn-warning btn-xs waves-effect waves-light"> <i class="fas fa-eye"></i></a>';
                    return $html;
                })
                ->rawColumns(['action', 'tiIsPaid'])
                ->make(true);
        } else {
            return abort(404);
        }
    }
}
