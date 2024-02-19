<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light scroll-smooth group" data-layout="vertical"
    data-sidebar="light" data-sidebar-size="lg" data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky"
    data-content="fluid" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yetimeshet Tadese yetimnew@gmail.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon" />

    <title>@yield('title', 'TIMS')</title>

    <script src="{{ asset('js/layout.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/tailwind2.css') }}">
    {{-- <link rel="stylesheet" href="assets/css/tailwind2.css"> --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    @yield('styles')

<body
    class="text-base bg-body-bg text-body font-public dark:text-zink-100 dark:bg-zink-800 group-data-[skin=bordered]:bg-body-bordered group-data-[skin=bordered]:dark:bg-zink-700">
    <div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">
