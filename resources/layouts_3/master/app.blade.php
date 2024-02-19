@include('layouts_3.master.head')

@include('layouts_3.master.topnav')
<!-- Side Navbar -->
@include('layouts_3.master.sidenav')
<div class="content-inner w-100">
    @yield('content')

    @include('layouts_3.master.footer')
    @yield('javascript')
    @section('javascript')
        <script>
            @if (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif

            @if (Session::has('info'))
                toastr.info('{{ Session::get('info') }}');
            @endif

            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @endif
        </script>
    @endsection
