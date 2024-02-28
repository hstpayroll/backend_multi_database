<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg"
    data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | HST PAYROLL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    
    <meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="pragma" content="no-cache">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    @include('tenants.layouts.head-css')
    <!-- Styles -->
    @livewireStyles
</head>

@include('tenants.layouts.body')

<div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">
    <!-- sidebar -->
    @include('tenants.layouts.sidebar')
    <!-- topbar -->
    @include('tenants.layouts.topbar')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <!-- page wrapper -->
        @include('tenants.layouts.page-wrapper')

        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <!-- content -->
            @yield('content')
        </div>
    </div>
    <!-- End Page-content -->
    <!-- footer -->
    @include('tenants.layouts.footer')
</div>
</div>
<!-- end main content -->
@stack('modals')
@include('tenants.layouts.customizer')
@include('tenants.layouts.vendor-scripts')

@livewireScripts
</body>

</html>
