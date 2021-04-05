@extends('admin.layouts.app')
@section('css-section')
<link href="{{url('public/admin/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('public/admin/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('public/admin/libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('public/admin/libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Tax Invoices</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="invoice-dashboard-list" class="table w-100 nowrap">
                    <thead>
                        <tr>
                            <th>Invoice No</th>
                            <th>Party Name</th>
                            <th>Invoice Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <td>A101</td>
                            <td>Siddhi Vinayak Printers</td>
                            <td>01-Jan-2021</td>
                            <td>25000.00</td>
                            <td><span class="btn btn-success btn-xs"> Done </span></td>
                            <td>
                                <a title="View" href="print-invoice.php"
                                    class="btn btn-warning btn-xs waves-effect waves-light"> <i class="fas fa-eye"></i>
                                </a>
                                <a title="Print" href="print-invoice.php"
                                    class="btn btn-primary btn-xs waves-effect waves-light"> <i
                                        class="fas fa-print"></i> </a>
                                <a title="Edit" href="#" class="btn btn-info btn-xs waves-effect waves-light"> <i
                                        class="fas fa-edit"></i> </a>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-section')
    <script src="{{url('public/admin/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/admin/libs/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{url('public/admin/libs/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('public/admin/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{url('public/admin/libs/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('public/admin/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{url('public/admin/libs/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{url('public/admin/libs/datatables/buttons.flash.min.js')}}"></script>
    <script src="{{url('public/admin/libs/datatables/buttons.print.min.js')}}"></script>
    <script src="{{url('public/admin/libs/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{url('public/admin/libs/datatables/dataTables.select.min.js')}}"></script>
    <script src="{{url('public/admin/libs/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{url('public/admin/libs/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{url('public/admin/js/pages/datatables.init.js')}}"></script>

    <script src="{{url('public/admin/js/custom/dashboard.js')}}" ></script>
@endsection
