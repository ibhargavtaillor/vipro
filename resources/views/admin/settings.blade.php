@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h3 class="page-title">Settings</h3>
        </div>
    </div>
</div>
<div class="row" >
    <div class="col-md-12" >
        @include('reusable-view.flash')
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            {!! Form::model($company, ["id"=>"companyForm",'route'=>$formUrl,'method'=>$method]) !!}
            <div class="card-body">
                <h4 class="header-title">Company Details</h4>
                <hr />
                <div class="form-group mb-3">
                    <label for="vCompanyName">Company Name</label>
                    {!! Form::text("vCompanyName", null, ["class"=>"form-control",'placeholder'=>'Company name goes here']) !!}
                </div>
                <div class="form-group mb-3">
                    <label for="txAddress">Company Address</label>
                    {!! Form::textarea("txAddress", null, ["class"=>"form-control",'placeholder'=>'Company address goes here','rows'=>'3']) !!}
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="vCompanyGstNumber">Company GST No.</label>
                            {!! Form::text("vCompanyGstNumber", null, ["class"=>"form-control",'placeholder'=>'Company GST']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="iSgst">SGST(%)</label>
                            {!! Form::text("iSgst", null, ["class"=>"form-control",'placeholder'=>'Company SGST']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="iCgst">CGST(%)</label>
                            {!! Form::text("iCgst", null, ["class"=>"form-control",'placeholder'=>'Company CGST']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="iIgst">IGST(%)</label>
                            {!! Form::text("iIgst", null, ["class"=>"form-control",'placeholder'=>'Company IGST']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-sm btn-dark"> Save </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Company Payment Terms</h4>
                <hr />
                <form action="{{route('settings.company.payment-terms')}}" method="POST" id="company-terms-form" >
                    {{ csrf_field() }}
                    <div class="d-flex">
                        <div class="flex-fill">
                            <div class="form-group mb-3">
                                <input type="text" id="vTitle" name="vTitle" class="form-control" placeholder="Payment terms goes here">
                                <input type="hidden" name="iCompanyTermId" id="iCompanyTermId" />
                            </div>
                        </div>
                        <div class="ml-3">
                            <button type="submit" class="btn btn-dark"> Save </a>
                        </div>
                    </div>
                </form>
                <div>
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Payment Terms</th>
                                    <th width="120px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($companyPaymentTerms->count() > 0)
                                @foreach ($companyPaymentTerms as $paymentTerms)
                                    <tr>    
                                        <th scope="row">{{$paymentTerms->iCompanyTermId}}</th>
                                        <td>{{$paymentTerms->vTitle}}</td>
                                        <td>
                                            <button title="Edit" data-title="{{$paymentTerms->vTitle}}" data-id="{{$paymentTerms->iCompanyTermId}}"  class="btn edit-company-terms btn-info btn-xs waves-effect waves-light">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button title="Delete" class="btn btn-danger btn-xs waves-effect waves-light">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" align="center" >
                                        No Payment Terms Available
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Company Banks Details</h4>
                <hr />
                <form action="{{route('settings.bankInfo')}}" method="POST" id="company-bank-form" >
                    {{ csrf_field() }}
                    <div class="form-group mb-3">
                        <label for="simpleinput">Bank Details</label>
                        <textarea class="form-control" id="txBankInfo" name="txBankInfo" placeholder="Company bank details" rows="3"></textarea>
                        <input type="hidden" name="iCompanyBankDetailId" id="iCompanyBankDetailId" />
                    </div>
                    <div class=" mb-3">
                        <button type="submit" class="btn btn-dark"> Save </button>
                    </div>
                </form>
                <div>
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Banks Details</th>
                                    <th width="120px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($bankDetails->count() > 0)
                                @foreach ($bankDetails as $bank)
                                <tr>
                                    <th scope="row">{{$bank->iCompanyBankDetailId}}</th>
                                    <td>{{$bank->txBankInfo}}</td>
                                    <td>
                                        <button data-id="{{$bank->iCompanyBankDetailId}}" data-bankinfo="{{$bank->txBankInfo}}" title="Edit" class="btn btn-info btn-xs waves-effect waves-light update-bankinfo">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a title="Delete" href="#"
                                            class="btn btn-danger btn-xs waves-effect waves-light"> <i
                                                class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" align="center" >
                                        No Bank Detail Available
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Company Terms & condition</h4>
                <hr />
                <form action="{{route("settings.companyTerms")}}" method="post" id="terms-condition-form" >
                    {{ csrf_field() }}
                    <div class="d-flex">
                        <div class="flex-fill">
                            <div class="form-group mb-3">
                                <input type="text" id="txCondition" name="txCondition" class="form-control" placeholder="Terms & condition goes here">
                                <input type="hidden" name="iCompanyContidionId" id="iCompanyContidionId" />
                            </div>
                        </div>
                        <div class="ml-3">
                            <button class="btn btn-dark"> Save </button>
                        </div>
                    </div>
                </form>
                <div>
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Terms & condition</th>
                                    <th width="120px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($companyTerms->count() > 0)
                                    @foreach ($companyTerms as  $terms)
                                        <tr>
                                            <th scope="row">{{$terms->iCompanyContidionId}}</th>
                                            <td>{{$terms->txCondition}}</td>
                                            <td>
                                                <button data-id="{{$terms->iCompanyContidionId}}" data-condition="{{$terms->txCondition}}" title="Edit" href="#" class="btn btn-info btn-xs update-condition waves-effect waves-light">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a title="Delete" href="#"
                                                    class="btn btn-danger btn-xs waves-effect waves-light"> <i
                                                        class="fas fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="5" align="center" >
                                        No Terms & Condition Available
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
@section('js-section')
{{-- Custom Javascript --}}
<script src="{{url("public/admin/js/jquery.validate.js")}}"></script>
<script src="{{url('public/admin/js/custom/settings.js')}}"></script>
@endsection
