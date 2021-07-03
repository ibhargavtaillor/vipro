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
            <form action="{{route('invoice.store')}}" method="POST" >
                {{ csrf_field() }}
                <input type="hidden" name="tiIsOutOfState" value="0" id="tiIsOutOfState" />
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="example-select">Select Party Name</label>
                                        <select name="iClientMasterId" class="form-control invoice-client" data-toggle="select2">
                                            <option selected>Select Party</option>
                                            @if ($clients->count() > 0)
                                            @foreach ($clients as $client)
                                            <option value="{{$client->iClientMasterId}}" >{{$client->vClientName}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="party-details mt-3">
                                        <p class="sub-header">
                                            <span class="font-weight-bold text-dark"> Address: </span> <span id="client-address" ></span> <br />
                                            <span class="font-weight-bold text-dark"> GST NO : <span id="client-gst" ></span> </span>
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
                                        <input type="text" name="vInvoiceNumber" id="simpleinput" class="form-control"  value="{{$invoiceNumber}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="example-date"> Invoice Date</label>
                                        <input class="form-control" name="dInvoiceDate" id="invoice-date" type="date" name="date">
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
                        <div id="item-list">
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group mb-2">
                                        <input name="invoiceItem[0][sr]" type="text" class="form-control form-control-sm bg-light srNo" placeholder="#" disabled="" value="1">
                                    </div>
                                </div>
                                <div class="col-md-4 item-dropdown ">
                                    <select name="invoiceItem[0][vItemTitle]" class="form-control select-invoice-item" data-toggle="select2">
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
                                        <input type="text" name="invoiceItem[0][vHSN]" class="form-control item-hsn form-control-sm" placeholder="#" value="">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group mb-2">
                                        <input type="number" min="0" name="invoiceItem[0][iQty]" class="form-control item-qty form-control-sm" placeholder="#" value="0">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <input type="text" name="invoiceItem[0][dRate]" class="form-control item-rate form-control-sm bg-light text-right" placeholder="#" readonly value="0">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control item-amount form-control-sm bg-light text-right text-dark font-weight-bold" name="invoiceItem[0][dAmount]" placeholder="#" readonly value="0">
                                    </div>
                                </div>
                                <div class="col-md-1 text-center">
                                    <button type="button" class="btn btn-danger remove-item btn-sm waves-effect waves-light"><i class="fas fa-eraser"></i></button>
                                </div>
                            </div>
                        </div>
                        <div id="item-template" style="display: none;">
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group mb-2">
                                        <input name="invoiceItemSr" type="text" class="form-control form-control-sm bg-light srNo" placeholder="#" disabled="" value="1">
                                    </div>
                                </div>
                                <div class="col-md-4 item-dropdown ">
                                    <select name="invoiceItemTitle" class="form-control select-invoice-item" >
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
                                        <input type="text" name="invoiceItemHsn" class="form-control item-hsn form-control-sm" placeholder="#" value="">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group mb-2">
                                        <input type="number" min="0" name="invoiceItemQty" class="form-control item-qty form-control-sm" placeholder="#" value="0">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <input type="text" name="invoiceItemRate" class="form-control item-rate form-control-sm bg-light text-right" placeholder="#" readonly value="0">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control item-amount form-control-sm bg-light text-right text-dark font-weight-bold" name="invoiceItemAmount" placeholder="#" readonly value="0">
                                    </div>
                                </div>
                                <div class="col-md-1 text-center">
                                    <button type="button" class="btn btn-danger remove-item btn-sm waves-effect waves-light"><i class="fas fa-eraser"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" id="btn5to10"
                                    class="btn btn-success add-item btn-xs waves-effect waves-light"><i class="fas fa-plus"></i> Add New Item</button>
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
                                        <select name="vPaymentTerms" class="form-control form-control-sm" id="example-select">
                                            <option value="" >Select Payment Terms</option>
                                            @if ($paymentTerms->count() > 0)
                                                @foreach ($paymentTerms as $key => $payTerm)
                                                    <option {{($key == 0) ? "selected" : ""}} value="{{$payTerm->iCompanyTermId}}" >{{$payTerm->vTitle}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-1">
                                        <label for="example-select mr-2">Terms & Conditions</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="txTermsAndCondition" class="form-control form-control-sm" id="company-condition">
                                            <option value="" >Select Condition</option>
                                            @if ($conditions->count() > 0)
                                                @foreach ($conditions as $key => $condition)
                                                    <option {{($key == 0) ? "selected" : ""}} value="{{$condition->iCompanyContidionId}}" >{{$condition->txCondition}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 pt-1">
                                        <label for="example-select mr-2">Bank Details</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="txBankDetail" class="form-control form-control-sm" id="comnapy-bank">
                                            <option selected >Select Bank</option>
                                            @if ($companyBank->count() > 0)
                                                @foreach ($companyBank as $key =>  $bank)
                                                    <option {{($key == 0) ? "selected" : ""}} value="{{$bank->iCompanyBankDetailId}}" >{{$bank->txBankInfo}}</option>
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
                                            <input type="text" id="dGrossTotal" name="dGrossTotal" class="form-control form-control-sm text-right font-weight-bold bg-light"
                                                readonly placeholder="#" value="0.00">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="btn btn-white btn-sm font-weight-bold"> Carting </span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="form-group mb-1">
                                            <input type="text" id="dCarting" name="dCarting" class="form-control form-control-sm text-right font-weight-bold" placeholder="#" value="0.00">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="btn btn-white btn-sm font-weight-bold"> Total </span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="form-group mb-1">
                                            <input type="text" id="dTotal" name="dTotal"  class="form-control form-control-sm text-right font-weight-bold  bg-light" readonly placeholder="#" value="0.00">
                                        </div>
                                    </div>
                                </div>
                                <div id="gst-block" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="btn btn-white btn-sm font-weight-bold"> SGST {{round($company->iSgst)}}% </span>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div class="form-group mb-1">
                                                <input type="text" id="dSGST" name="dSGST" class="form-control form-control-sm text-right font-weight-bold  bg-light" readonly placeholder="#" value="0.00">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="btn btn-white btn-sm font-weight-bold"> CGST {{ round($company->iCgst)}}% </span>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div class="form-group mb-1">
                                                <input id="dCGST" name="dCGST" type="text" class="form-control form-control-sm text-right font-weight-bold  bg-light" readonly placeholder="#" value="0.00">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="igst-block" style="display: none" >
                                    <div class="row" >
                                        <div class="col-md-6">
                                            <span class="btn btn-white btn-sm font-weight-bold"> IGST {{ round($company->iIgst)}}% </span>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div class="form-group mb-1">
                                                <input id="dIGST" name="dIGST" type="text" class="form-control form-control-sm text-right font-weight-bold  bg-light" readonly placeholder="#" value="0.00">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="btn btn-white btn-sm font-weight-bold"> Round Off </span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="form-group mb-1">
                                            <input type="text" id="dRoundOff" name="dRoundOff" class="form-control form-control-sm text-right font-weight-bold" placeholder="#" value="0.00">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="btn btn-white btn-sm font-weight-bold"> Ground Total </span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="form-group mb-1">
                                            <input type="text" id="dGrandTotal" name="dGrandTotal" class="form-control form-control-sm text-right font-weight-bold text-white bg-success border-success" readonly placeholder="#" value="0.00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg- p-2">
                        <div class="text-center d-print-none">
                            <button type="submit" class="btn btn-dark btn-lg">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js-section')
{{-- <script src="{{url('public/admin/js/pages/form-advanced.init.js')}}"  ></script> --}}
<script>
    
    var iSgst = parseFloat('{{$company->iSgst}}');
    var iCgst = parseFloat('{{$company->iCgst}}');
    var iIgst = parseFloat('{{$company->iIgst}}');
</script>
<script src="{{url('public/admin/js/custom/invoice.js')}}"  ></script>
@endsection
