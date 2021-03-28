<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title> Invoice Listing :: Vipro Print Pack </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @include('admin.layouts.header-stylesheet')
    @yield('css-section')
</head>

<body>
    <header id="topnav">
        @include('admin.layouts.header-nav')
    </header>
    
    <div class="wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    @include('admin.layouts.footer')
    @include('admin.layouts.footer-script')
    @yield('js-section')
</body>

</html>
