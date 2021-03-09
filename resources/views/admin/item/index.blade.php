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
            <h3 class="page-title">Items Details</h3>
        </div>
    </div>
</div>     
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Items Details</h4>
                <hr />
                <div class="form-group mb-3">
                    <label for="simpleinput">Items Name</label>
                    <input type="text" id="simpleinput" class="form-control" value="250 Gram Sweet Box" placeholder="Items  name goes here">
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="simpleinput">Item Rate</label>
                            <input type="text" id="simpleinput" class="form-control" value="1.25" placeholder="Client  GST">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="btn btn-sm btn-dark"> Save </a>
                    </div>
                </div>
            </div> 
        </div> 
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Items  Lists</h4>
                <hr />
                <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Items Name</th>
                            <th>Rate</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>250 Gram Sweet Box</td>
                            <td>1.25</td>
                            <td>
                                <a title="Edit" href="#" class="btn btn-info btn-xs waves-effect waves-light"> <i class="fas fa-edit"></i> </a>
                                <a title="Delete" href="#" class="btn btn-danger btn-xs waves-effect waves-light"> <i class="fas fa-trash"></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>500 Gram Sweet Box</td>
                            <td>1.50</td>
                            <td>
                                <a title="Edit" href="#" class="btn btn-info btn-xs waves-effect waves-light"> <i class="fas fa-edit"></i> </a>
                                <a title="Delete" href="#" class="btn btn-danger btn-xs waves-effect waves-light"> <i class="fas fa-trash"></i> </a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>1KG Gram Sweet Box</td>
                            <td>1.75</td>
                            <td>
                                <a title="Edit" href="#" class="btn btn-info btn-xs waves-effect waves-light"> <i class="fas fa-edit"></i> </a>
                                <a title="Delete" href="#" class="btn btn-danger btn-xs waves-effect waves-light"> <i class="fas fa-trash"></i> </a>
                            </td>
                        </tr>
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
@endsection
