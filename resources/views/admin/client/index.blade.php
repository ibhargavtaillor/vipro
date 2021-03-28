@extends('admin.layouts.app')
@section("css-section")
<link href="{{url('public/admin/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
<!-- third party css -->
<link href="{{url('public/admin/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('public/admin/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('public/admin/libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('public/admin/libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h3 class="page-title">Clients Details</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        {!! Form::model($model, ["id"=>"clientForm"]) !!}
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Clients Details</h4>
                <hr />
                @include('reusable-view.flash')
                <div class="form-group mb-3">
                    <label for="vClientName">Client Name</label>
                    {!! Form::text("vClientName", null, ["class"=>"form-control",'placeholder'=>'Client name goes here']) !!}
                </div>
                <div class="form-group mb-3">
                    <label for="txAddress">Client Address</label>
                    {!! Form::textarea("txAddress", null, ["class"=>"form-control",'placeholder'=>'Client name goes here', 'id'=>"example-textarea",'rows'=>'3']) !!}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="vGST">Client GST No.</label>
                            {!! Form::text("vGST", null, ["class"=>"form-control",'placeholder'=>'Client GST']) !!}
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
                <h4 class="header-title">Client Lists</h4>
                <hr />
                <table class="datatable mdl-data-table dataTable table table-bordered table-striped" cellspacing="0"
                    width="100%" role="grid" style="width: 100%;" id='datatable'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Client Name</th>
                            <th>Address</th>
                            <th>GST No.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-section')
<script src="{{url("public/admin/libs/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{url("public/admin/libs/datatables/dataTables.bootstrap4.js")}}"></script>
<script src="{{url("public/admin/libs/datatables/dataTables.responsive.min.js")}}"></script>
<script src="{{url("public/admin/libs/datatables/responsive.bootstrap4.min.js")}}"></script>
<script src="{{url("public/admin/libs/datatables/dataTables.buttons.min.js")}}"></script>
<script src="{{url("public/admin/libs/datatables/buttons.bootstrap4.min.js")}}"></script>
<script src="{{url("public/admin/libs/datatables/buttons.html5.min.js")}}"></script>
<script src="{{url("public/admin/libs/datatables/buttons.flash.min.js")}}"></script>
<script src="{{url("public/admin/libs/datatables/buttons.print.min.js")}}"></script>
<script src="{{url("public/admin/libs/datatables/dataTables.keyTable.min.js")}}"></script>
<script src="{{url("public/admin/libs/datatables/dataTables.select.min.js")}}"></script>
<script src="{{url("public/admin/libs/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{url("public/admin/libs/pdfmake/vfs_fonts.js")}}"></script>
<!-- Init js-->
<script src="{{url("public/admin/js/jquery.validate.js")}}"></script>
<script src="{{url("public/admin/js/custom/client.js")}}"></script>
@endsection
