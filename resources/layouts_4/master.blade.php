<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg"
    data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | Tailwick - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    @include('layouts_4.head-css')
    {{-- <script src="{{ asset('build/js/layout.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/css/icons.min.css') }}"> --}}
    <!-- Tailwind CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('build/css/tailwind.min.css') }}"> --}}
    <!-- Styles -->
    @livewireStyles
</head>

@include('layouts_4.body')

<div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">
    <!-- sidebar -->
    @include('layouts_4.sidebar')
    <!-- topbar -->
    @include('layouts_4.topbar')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <!-- page wrapper -->
        @include('layouts_4.page-wrapper')

        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <!-- content -->
            @yield('content')
        </div>
    </div>
    <!-- End Page-content -->
    <!-- footer -->
    @include('layouts_4.footer')
</div>
</div>
<!-- end main content -->
@stack('modals')
@include('layouts_4.customizer')
@include('layouts_4.vendor-scripts')

@livewireScripts
</body>

</html>
