@extends('tenants.layouts.master')
@section('title')
    {{ __('General') }}
@endsection
@section('content')

    <div class="mt-4 flex justify-between items-center">
        <div class="text-left">
            <span class="font-bold">Common</span>
        </div>
        <div class="text-right">
            <span class="text-gray-600">General Setting ></span>
            <span class="font-bold">Common ></span>
            <span class="font-bold">
                @if(isset($title) && $title === __('currency')) Currency
                @elseif (isset($title) && $title === __('bank')) Bank
                @else .....
                @endif
            </span>
        </div>
    </div>
    <div class="mt-4 -ml-3 -mr-3 rounded-none card">
        <div class="card-body !px-2.5 !py-0">
            <ul class="flex flex-wrap w-full text-sm font-medium text-center nav-tabs">

                <li class="@if(isset($title) && $title === __('currency')) group active @else group @endif">
                    <a href="javascript:void(0);" data-tab-toggle data-target="currency"
                        class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 dark:group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Currency</a>
                </li>

                <li class="@if(isset($title) && $title === __('bank')) group active @else group @endif">
                    <a href=" " data-tab-toggle data-target="bank"
                        class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border-b border-transparent group-[.active]:text-custom-500 dark:group-[.active]:text-custom-500 group-[.active]:border-b-custom-500 dark:group-[.active]:border-b-custom-500 hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Bank</a>
                </li>
            </ul>
        </div>
    </div><!--end card-->

    <div class="tab-content">

        @yield('body')

    </div>

@endsection
@push('scripts')
    <!-- apexcharts js -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/pages-account.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush