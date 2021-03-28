<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login :: MedEMPIRE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @include("admin.layouts.header-stylesheet")
</head>

<body class="authentication-bg authentication-bg-pattern">
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-2">
                                <a href="index.php">
                                    <span>
                                        <img src="{{url('public/admin/images/logo-dark.png')}}" alt="" height="40">
                                    </span>
                                </a>
                            </div>
                            @include('reusable-view.flash')
                            <form action="{{route("signIn")}}" method="POST" id="login-form" autocomplete="off">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <label for="emailaddress">User Name</label>
                                    <input class="form-control" type="email" name="email" id="emailaddress"
                                        placeholder="Email, ID number or phone">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label> <i class="mdi mdi-information"
                                        title="Please use your ID number as your password if you’ve been registered by your hospital"
                                        data-plugin="tippy" data-tippy-placement="top" data-tippy-arrow="true"
                                        data-tippy-arrowType="round" data-tippy-animation="fade"
                                        data-tippy-theme="light"></i>
                                    <input name="password" class="form-control" type="password" id="password"
                                        placeholder="Enter your password">
                                </div>
                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-dark btn-block" type="submit"> Log In </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer footer-alt">
        2021 &copy; <a href="{{url('/')}}" class="text-white-50">ViproPrintPack</a>. All rights reserved.
    </footer>
    @include('admin.layouts.footer-script')
    <script src="{{url("public/admin/js/jquery.validate.js")}}"></script>
    <script>
        $("#login-form").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                }
            },
            messages: {
                email: {
                    required: "Please enter a Email",
                    email: "Please enter a valida Email",
                },
                password: {
                    required: "Please enter Password",
                }
            }
        });

    </script>
</body>

</html>
