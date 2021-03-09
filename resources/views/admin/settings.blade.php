@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h3 class="page-title">Settings</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Company Details</h4>
                <hr />
                <div class="form-group mb-3">
                    <label for="simpleinput">Company Name</label>
                    <input type="text" id="simpleinput" class="form-control" value="Vipro Print Pack"
                        placeholder="Company name goes here">
                </div>
                <div class="form-group mb-3">
                    <label for="simpleinput">Company Address</label>
                    <textarea class="form-control" id="example-textarea" placeholder="Company address goes here"
                        rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="simpleinput">Company GST No.</label>
                            <input type="text" id="simpleinput" class="form-control" value="24AAAADFTGD2016A62"
                                placeholder="Company GST">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="simpleinput">SGST</label>
                            <input type="text" id="simpleinput" class="form-control" value="9%"
                                placeholder="Company SGST">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="simpleinput">CGST</label>
                            <input type="text" id="simpleinput" class="form-control" value="9%"
                                placeholder="Company CGST">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="#" class="btn btn-sm btn-dark"> Save </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Company Payment Terms</h4>
                <hr />
                <div class="d-flex">
                    <div class="flex-fill">
                        <div class="form-group mb-3">
                            <input type="text" id="simpleinput" class="form-control"
                                placeholder="Payment terms goes here">
                        </div>
                    </div>
                    <div class="ml-3">
                        <a href="#" class="btn btn-dark"> Save </a>
                    </div>
                </div>
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>7 Days</td>
                                    <td>
                                        <a title="Edit" href="#" class="btn btn-info btn-xs waves-effect waves-light">
                                            <i class="fas fa-edit"></i> </a>
                                        <a title="Delete" href="#"
                                            class="btn btn-danger btn-xs waves-effect waves-light"> <i
                                                class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>15 Days</td>
                                    <td>
                                        <a title="Edit" href="#" class="btn btn-info btn-xs waves-effect waves-light">
                                            <i class="fas fa-edit"></i> </a>
                                        <a title="Delete" href="#"
                                            class="btn btn-danger btn-xs waves-effect waves-light"> <i
                                                class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>30 Days</td>
                                    <td>
                                        <a title="Edit" href="#" class="btn btn-info btn-xs waves-effect waves-light">
                                            <i class="fas fa-edit"></i> </a>
                                        <a title="Delete" href="#"
                                            class="btn btn-danger btn-xs waves-effect waves-light"> <i
                                                class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
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
                <div class="form-group mb-3">
                    <label for="simpleinput">Bank Details</label>
                    <textarea class="form-control" id="example-textarea" placeholder="Company bank details"
                        rows="3"></textarea>
                </div>
                <div class=" mb-3">
                    <a href="#" class="btn btn-dark"> Save </a>
                </div>
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Dena Bank, A/c No. DB145214585</td>
                                    <td>
                                        <a title="Edit" href="#" class="btn btn-info btn-xs waves-effect waves-light">
                                            <i class="fas fa-edit"></i> </a>
                                        <a title="Delete" href="#"
                                            class="btn btn-danger btn-xs waves-effect waves-light"> <i
                                                class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>SBI Bank, A/c No. SBIN145214585</td>
                                    <td>
                                        <a title="Edit" href="#" class="btn btn-info btn-xs waves-effect waves-light">
                                            <i class="fas fa-edit"></i> </a>
                                        <a title="Delete" href="#"
                                            class="btn btn-danger btn-xs waves-effect waves-light"> <i
                                                class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
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
                <div class="d-flex">
                    <div class="flex-fill">
                        <div class="form-group mb-3">
                            <input type="text" id="simpleinput" class="form-control"
                                placeholder="Terms & condition goes here">
                        </div>
                    </div>
                    <div class="ml-3">
                        <a href="#" class="btn btn-dark"> Save </a>
                    </div>
                </div>
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Subject to Ahmedabad Jurisdiction</td>
                                    <td>
                                        <a title="Edit" href="#" class="btn btn-info btn-xs waves-effect waves-light">
                                            <i class="fas fa-edit"></i> </a>
                                        <a title="Delete" href="#"
                                            class="btn btn-danger btn-xs waves-effect waves-light"> <i
                                                class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Subject to Ahmedabad Jurisdiction</td>
                                    <td>
                                        <a title="Edit" href="#" class="btn btn-info btn-xs waves-effect waves-light">
                                            <i class="fas fa-edit"></i> </a>
                                        <a title="Delete" href="#"
                                            class="btn btn-danger btn-xs waves-effect waves-light"> <i
                                                class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Subject to Ahmedabad Jurisdiction</td>
                                    <td>
                                        <a title="Edit" href="#" class="btn btn-info btn-xs waves-effect waves-light">
                                            <i class="fas fa-edit"></i> </a>
                                        <a title="Delete" href="#"
                                            class="btn btn-danger btn-xs waves-effect waves-light"> <i
                                                class="fas fa-trash"></i> </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
