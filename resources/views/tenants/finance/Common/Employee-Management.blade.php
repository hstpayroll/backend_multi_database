@extends('tenants.layouts.master')
@section('title')
    {{ __('General') }}
@endsection
@section('content')

    <div class="mt-4 flex justify-between items-center">
        <div class="text-left">
            <span class="font-bold">Employee Detail</span>
        </div>
        <div class="text-right">
            <span class="text-gray-600">Employee ></span>
            <span class="font-bold">Employee Management ></span>
            <span class="font-bold">
                @if(isset($title) && $title === __('employee_info')) Employee List
                @endif
            </span>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">

            <ul class="flex flex-wrap w-full text-sm font-medium text-center nav-tabs">

                <li class="@if(isset($title) && $title === __('employee_info')) group active @else group @endif">
                    <a href="{{ route('companies.index') }}" data-tab-toggle data-target="company_info"
                        class="inline-block px-4 w-full py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">
                        Employee List</a>
                </li>

                <li class="@if(isset($title) && ($title === __(' ') )) group active @else group @endif">
                    <a href=" " data-tab-toggle data-target="currency"
                        class="inline-block px-4 w-full py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">
                        Employee Salary</a>
                </li>

                <li class="@if(isset($title) && ($title === __(' ') )) group active @else group @endif">
                    <a href=" " data-tab-toggle data-target="currency"
                        class="inline-block px-4 w-full py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">
                        Employee Earning</a>
                </li>

                <li class="@if(isset($title) && ($title === __(' ') )) group active @else group @endif">
                    <a href=" " data-tab-toggle data-target="currency"
                        class="inline-block px-4 w-full py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">
                        Employee Deduction</a>
                </li>

                <li class="@if(isset($title) && ($title === __(' ') )) group active @else group @endif">
                    <a href=" " data-tab-toggle data-target="currency"
                        class="inline-block px-4 w-full py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">
                        Employee Loan</a>
                </li>

                <li class="@if(isset($title) && ($title === __(' ') )) group active @else group @endif">
                    <a href=" " data-tab-toggle data-target="currency"
                        class="inline-block px-4 w-full py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">
                        Employee Over-Time</a>
                
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

    <!-- list js-->
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- User list init js -->
    <script src="{{ URL::asset('build/js/pages/apps-user-list.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush