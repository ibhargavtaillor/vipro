@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Print Invoice</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <!-- Logo & title -->
            <div class="clearfix">
                <div class="float-left">
                    <img src="assets/images/logo-dark.png" alt="" height="20">
                </div>
                <div class="float-right">
                    <h4 class="m-0 d-print-none">Invoice</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mt-3">
                        <p><b>Hello, {{$invoice->vClientName}}</b></p>
                        <p class="text-muted">Thanks a lot because you keep purchasing our products. Our company
                            promises to provide high quality products for you as well as outstanding
                            customer service for every transaction. </p>
                    </div>

                </div><!-- end col -->
                <div class="col-md-4 offset-md-2">
                    <div class="mt-3 float-right">
                        <p class="m-b-10"><strong>Order Date : </strong> <span class="float-right">
                                &nbsp;&nbsp;&nbsp;&nbsp; {{date("M d, Y",strtotime($invoice->dInvoiceDate))}}</span></p>
                        <p class="m-b-10"><strong>Order Status : </strong> <span class="float-right"><span
                                    class="badge badge-danger">Unpaid</span></span></p>
                        <p class="m-b-10"><strong>Order No. : </strong> <span
                                class="float-right">{{$invoice->vInvoiceNumber}} </span></p>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row mt-3">
                <div class="col-sm-6">
                    <h6>Billing Address</h6>
                    <address>
                        Stanley Jones<br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div> <!-- end col -->

                <div class="col-sm-6">
                    <h6>Shipping Address</h6>
                    <address>
                        {{$invoice->txShippingAddress}}
                    </address>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table mt-4 table-centered">
                            <thead>
                                <tr>
                                    <th style="width: 6%">Sr. No.</th>
                                    <th>Particular</th>
                                    <th style="width: 6%">HSN</th>
                                    <th style="width: 10%">Qty</th>
                                    <th style="width: 10%" class="text-right">Rate</th>
                                    <th style="width: 10%" class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($invoice->items->count() > 0)
                                @foreach ($invoice->items as $item )
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <b>{{$item->vItemTitle}}</b>
                                    </td>
                                    <td>{{($item->vHSN != "") ? $item->vHSN : "-" }}</td>
                                    <td>{{$item->iQty}}</td>
                                    <td class="text-right">{{ number_format($item->dRate,2)}}/-</td>
                                    <td class="text-right">{{number_format($item->dAmount,2)}}/-</td>
                                </tr>    
                                @endforeach
                                
                                @endif

                            </tbody>
                        </table>
                    </div> <!-- end table-responsive -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-sm-6">
                    <div class="row" >
                        <div class="col-md-9" >
                            <div>
                                <label>Payment Terams:</label>
                                <span>{{$invoice->vPaymentTerms}}</span>
                            </div>
                            <div>
                                <label>Bank Detail:</label>
                                <span>{{$invoice->txBankDetail}}</span>
                            </div>
                            <div>
                                <label>Terms & Condition:</label>
                                <span>{{$invoice->txTermsAndCondition}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix ">
                        <h6 class="text-muted">Notes:</h6>
                        <small class="text-muted">
                            All accounts are to be paid within 7 days from receipt of
                            invoice. To be paid by cheque or credit card or direct payment
                            online. If account is not paid within 7 days the credits details
                            supplied as confirmation of work undertaken will be charged the
                            agreed quoted fee noted above.
                        </small>
                    </div>
                </div> <!-- end col -->
                <div class="col-sm-6">
                    <div class="float-right print-invoice-footer">
                        <p class="mb-0"><b>Gross total:</b> <span class="float-right">{{number_format($invoice->dGrossTotal,2)}}/-</span></p>
                        <p class="mb-0"><b>Carting:</b> <span class="float-right">{{number_format($invoice->dCarting,2)}}/-</span></p>
                        <p class="mb-0"><b>Total:</b> <span class="float-right">{{number_format($invoice->dTotal,2)}}/-</span></p>
                        @if($invoice->tiIsOutOfState == "0")
                            <p class="mb-0"><b>SGST {{$invoice->dSGSTPerc}}%:</b> <span class="float-right">{{number_format($invoice->dSGST,2)}}/-</span></p>
                            <p class="mb-0"><b>CGST {{$invoice->dCGSTPerc}}%:</b> <span class="float-right">{{number_format($invoice->dCGST,2)}}/-</span></p>
                        @else
                            <p class="mb-0"><b>IGST {{$invoice->dIGSTPerc}}%:</b> <span class="float-right">{{number_format($invoice->dIGST,2)}}/-</span></p>
                        @endif
                        <p class="mb-0"><b>Round Off:</b> <span class="float-right">{{number_format($invoice->dRoundOff,2)}}/-</span></p>
                        <h3 class="text-right">
                            <span class="float-left text-muted"> Total: </span>
                            {{number_format($invoice->dGrandTotal,2)}}/-
                        </h3>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="mt-4 mb-1">
                <div class="text-right d-print-none">
                    <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
