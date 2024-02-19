<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yetimeshet Tadese yetimnew@gmail.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon" />

    <title>@yield('title', 'TIMS')</title>

    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">

</head>

<body>
    <div class="login-page">
        <div class="container d-flex align-items-center position-relative py-5">
            <div class="card shadow-sm w-100 rounded overflow-hidden bg-none">
                <div class="card-body p-0">
                    <div class="row gx-0 align-items-stretch">
                        <!-- Logo & Information Panel-->
                        <div class="col-lg-6">
                            <div class="info d-flex justify-content-center flex-column p-4 h-100">
                                <div class="logo">
                                    <div class="avatar text-center"><img src="img/logo.png" alt="company Logo"
                                            class="img-fluid" width="500" height="350">
                                    </div>
                                </div>
                                <div class="py-5">
                                    <h1 class="text-center">HST</h1>
                                    <p> Payroll Managment</p>

                                </div>
                            </div>
                        </div>
                        <!-- Form Panel    -->
                        <div class="col-lg-6 bg-white">
                            <div class="d-flex align-items-center px-4 px-lg-5 h-100">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center position-absolute bottom-0 start-0 w-100 z-index-20">

        </div>
    </div>

</body>

</html>
