<!-- Layout config Js -->
<script src="{{ asset('build/js/layout.js') }}"></script>
{{-- <script src="{{ asset('bootstrap/js/app.js') }}"></script> --}}

@stack('css')
<!-- Icons CSS -->
<link rel="stylesheet" href="{{ asset('build/css/icons.min.css') }}">
<!-- Tailwind CSS -->
<link rel="stylesheet" href="{{ asset('build/css/tailwind.min.css') }}">
<script>
    var app_url = '{{ env('APP_URL') }}'
</script>
