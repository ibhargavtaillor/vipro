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
        {!! Form::model($model, ["id"=>"itemForm",'route'=>$formUrl,'method'=>$method]) !!}
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Items Details</h4>
                <hr />
                @include('reusable-view.flash')
                <div class="form-group mb-3">
                    <label for="vTitle">Items Name</label>
                    {!! Form::text("vTitle", null, ["class"=>"form-control",'placeholder'=>'Items name goes here']) !!}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="dcPrice">Item Rate</label>
                            {!! Form::text("dcPrice", null, ["class"=>"form-control",'placeholder'=>'Client GST']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-sm btn-dark"> Save </button>
                    </div>
                </div>
            </div> 
        </div>
        {!! Form::close() !!} 
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Items  Lists</h4>
                <hr />
                <table id="item-datatable" class="table w-100 nowrap">
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
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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

    {{-- Custom Javascript --}}
    <script src="{{url("public/admin/js/jquery.validate.js")}}"></script>
    <script src="{{url('public/admin/js/custom/item.js')}}"></script>
@endsection
