<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="EMS - Tech Rajshahi">
    <meta name="keywords" content="tech rajshahi, employee management system, tr ems">
    <meta name="author" content="Md. Fahim Tayebee">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - Tech Rajshahi EMS</title>

    <link rel="shortcut icon" href="{{ asset('storage/assets-v2/img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('storage/assets-v2/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets-v2/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets-v2/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets-v2/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets-v2/css/material.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets-v2/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets-v2/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets-v2/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/assets-v2/css/style.css') }}">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">

                <div class="account-logo">
                    @if(!empty(\App\Models\CompanyDetail::orderby('id','desc')->first()->company_logo))
                        <img src="{{ asset('storage/uploads/company/'. \App\Models\CompanyDetail::orderby('id','desc')->first()->company_logo) }}" 
                            alt="company logo" alt="Tech Rajshahi EMS">
                    @else
                        <img src="{{ asset('storage/assets/images/browser.png') }}" alt="company logo" height="40" class="img-fluid w-50">
                    @endif
                </div>

                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('storage/assets-v2/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('storage/assets-v2/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('storage/assets-v2/js/layout.js') }}"></script>
    <script src="{{ asset('storage/assets-v2/js/theme-settings.js') }}"></script>
    <script src="{{ asset('storage/assets-v2/js/greedynav.js') }}"></script>
    <script src="{{ asset('storage/assets-v2/js/app.js') }}"></script>
</body>

</html>
