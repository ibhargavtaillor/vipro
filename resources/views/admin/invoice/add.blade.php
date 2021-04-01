@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Add New Invoices</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="example-select">Select Party Name</label>
                                    <select class="form-control" data-toggle="select2">
                                        <option selected>Select Party</option>
                                        @if ($clients->count() > 0)
                                        @foreach ($clients as $client)
                                        <option>{{$client->vClientName}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="party-details mt-3">
                                    <p class="sub-header">
                                        <span class="font-weight-bold text-dark"> Address: </span> Shihor <br />
                                        <span class="font-weight-bold text-dark"> GST NO : </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="simpleinput">Invoice No.</label>
                                    <input type="text" id="simpleinput" class="form-control bg-light" disabled=""
                                        value="{{$invoiceNumber}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="example-date"> Invoice Date</label>
                                    <input class="form-control" id="example-date" type="date" name="date">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-body">
                    <div class="row bg-light py-2 mb-2">
                        <div class="col-md-1">
                            <span class="font-weight-bold text-dark"> Sr. No </span>
                        </div>
                        <div class="col-md-4">
                            <span class="font-weight-bold text-dark"> Particular </span>
                        </div>
                        <div class="col-md-1">
                            <span class="font-weight-bold text-dark"> HSN </span>
                        </div>
                        <div class="col-md-1">
                            <span class="font-weight-bold text-dark"> Qty </span>
                        </div>
                        <div class="col-md-2 text-right">
                            <span class="font-weight-bold text-dark "> Rate </span>
                        </div>
                        <div class="col-md-2 text-right">
                            <span class="font-weight-bold text-dark"> Amount </span>
                        </div>
                        <div class="col-md-1 text-center">
                            <span class="font-weight-bold text-dark"> Action </span>
                        </div>
                    </div>
                    <div id="view1to5">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm bg-light" placeholder="#"
                                        disabled="" value="1">
                                </div>
                            </div>
                            <div class="col-md-4 item-dropdown ">
                                <select class="form-control" data-toggle="select2">
                                    <option selected >Select Item</option>
                                    @if($items->count() > 0)
                                    @foreach ($items as $item )
                                        <option value="{{$item->iItemMasterId}}" >{{$item->vTitle}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" placeholder="#" value="">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" placeholder="#"
                                        value="1000">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm bg-light text-right"
                                        placeholder="#" disabled="" value="0.80">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-2">
                                    <input type="text"
                                        class="form-control form-control-sm bg-light text-right text-dark font-weight-bold"
                                        placeholder="#" disabled="" value="800.00">
                                </div>
                            </div>
                            <div class="col-md-1 text-center">
                                <button type="button" class="btn btn-danger btn-sm waves-effect waves-light"><i
                                        class="fas fa-eraser"></i></button>
                            </div>
                        </div>
                    </div>
                    <div id="view5to10" style="display: none;">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm bg-light" placeholder="#"
                                        disabled="" value="1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" data-toggle="select2">
                                    <option selected>Select Item</option>
                                    @if($items->count() > 0)
                                    @foreach ($items as $item )
                                        <option value="{{$item->iItemMasterId}}" >{{$item->vTitle}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" placeholder="#" value="">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm" placeholder="#"
                                        value="1000">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control form-control-sm bg-light text-right"
                                        placeholder="#" disabled="" value="0.80">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-2">
                                    <input type="text"
                                        class="form-control form-control-sm bg-light text-right text-dark font-weight-bold"
                                        placeholder="#" disabled="" value="800.00">
                                </div>
                            </div>
                            <div class="col-md-1 text-center">
                                <button type="button" class="btn btn-danger btn-sm waves-effect waves-light"><i
                                        class="fas fa-eraser"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" id="btn5to10"
                                class="btn btn-success btn-xs waves-effect waves-light"><i class="fas fa-plus"></i> View 5 More</button>
                        </div>
                    </div>
                </div>
                <div class="invoice-foooter mt-3">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="grand-total-in-words text-dark font-weight-bold bg-light p-2 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        Two thousand eight hundred thirty-two only.
                                    </div>
                                    <div class="col-md-6">
                                        Company GST : <span class="font-weight-bold text-dark"> {{$company->vCompanyGstNumber}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 pt-1">
                                    <label for="example-select mr-2">Select Payment Terms :</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control form-control-sm" id="example-select">
                                        <option>7 Days</option>
                                        <option>15 Days</option>
                                        <option>1 Month</option>
                                        <option>3 Month</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 pt-1">
                                    <label for="example-select mr-2">Terms & Conditions</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control form-control-sm" id="example-select">
                                        <option>Subject to Ahmedabad Jurisdiction</option>
                                        <option>18% Interest Will charge for the Period for the due date of the bill.
                                        </option>
                                        <option>Goods Once sold will not be taken back.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 pt-1">
                                    <label for="example-select mr-2">Bank Details</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control form-control-sm" id="example-select">
                                        <option selected >Select Bank</option>
                                        @if ($companyBank->count() > 0)
                                            @foreach ($companyBank as $bank)
                                                <option value="{{$bank->iCompanyBankDetailId}}" >{{$bank->txBankInfo}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="btn btn-white btn-sm font-weight-bold"> Gross Total </span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="form-group mb-1">
                                        <input type="text"
                                            class="form-control form-control-sm text-right font-weight-bold bg-light"
                                            disabled="" placeholder="#" value="2400.00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="btn btn-white btn-sm font-weight-bold"> Carting </span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="form-group mb-1">
                                        <input type="text"
                                            class="form-control form-control-sm text-right font-weight-bold"
                                            placeholder="#" value="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="btn btn-white btn-sm font-weight-bold"> Total </span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="form-group mb-1">
                                        <input type="text"
                                            class="form-control form-control-sm text-right font-weight-bold  bg-light"
                                            disabled="" placeholder="#" value="2400.00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="btn btn-white btn-sm font-weight-bold"> SGST {{round($company->iSgst)}}% </span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="form-group mb-1">
                                        <input type="text"
                                            class="form-control form-control-sm text-right font-weight-bold  bg-light"
                                            disabled="" placeholder="#" value="216.00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="btn btn-white btn-sm font-weight-bold"> CGST {{ round($company->iCgst)}}% </span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="form-group mb-1">
                                        <input type="text"
                                            class="form-control form-control-sm text-right font-weight-bold  bg-light"
                                            disabled="" placeholder="#" value="216.00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="btn btn-white btn-sm font-weight-bold"> Round Off </span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="form-group mb-1">
                                        <input type="text"
                                            class="form-control form-control-sm text-right font-weight-bold"
                                            placeholder="#" value="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="btn btn-white btn-sm font-weight-bold"> Ground Total </span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="form-group mb-1">
                                        <input type="text"
                                            class="form-control form-control-sm text-right font-weight-bold text-white bg-success border-success"
                                            disabled="" placeholder="#" value="2832.00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg- p-2">
                    <div class="text-center d-print-none">
                        <button href="#" class="btn btn-dark btn-lg">Submit</button>
                        <button href="javascript:window.print()" class="btn btn-light"> Cancel </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-section')
<script src="{{url('public/admin/js/pages/form-advanced.init.js')}}"  ></script>
@endsection
