<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yetimeshet Tadese yetimnew@gmail.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon" />

    <title>@yield('title', 'TIMS')</title>

    {{--
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https:/fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- Font Awesome CSS-->

    <link rel="stylesheet" href="https:/use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/style.default.css') }}">
    {{--
    <link rel="stylesheet" href="{{ asset('bootstrap/css/font-awesome.min.css')}}"> --}}
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/custom.css') }}">


    <link rel="stylesheet" href="{{ asset('bootstrap/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/jquery.dataTables.min.css') }}">
    {{--
    <link rel="stylesheet" href="{{asset('bootstrap/css/fontastic.css')}}"> --}}
    {{--
    <link rel="stylesheet" href="{{asset('bootstrap/icons-reference/styles.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/jquery.datetimepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/select2-bootstrap.min.css') }}">

    @yield('styles')
