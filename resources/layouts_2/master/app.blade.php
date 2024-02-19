@include('layouts_2.master.head')
@include('layouts_2.master.sidenav')
@include('layouts_2.master.topnav')
@yield('content')

@include('layouts_2.master.footer')
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
@endsection --}}
