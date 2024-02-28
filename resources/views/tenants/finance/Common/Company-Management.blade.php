@extends('tenants.layouts.master')
@section('title')
    {{ __('General') }}
@endsection
@section('content')

    <div class="mt-4 flex justify-between items-center">
        <div class="text-left">
            <span class="font-bold">Comapny Detail</span>
        </div>
        <div class="text-right">
            <span class="text-gray-600">Company ></span>
            <span class="font-bold">Comapny Detail ></span>
            <span class="font-bold">
                @if(isset($title) && $title === __('company_info')) Company Information
                @elseif (isset($title) && 
                ($title === __('department') || 
                $title === __('sub_department') ||
                $title === __('position') ||
                $title === __('grade') )) Department
                @else .....
                @endif
            </span>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">

            <div class="card-body !px-2.5">
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-12 2xl:grid-cols-12">
                    <div class="lg:col-span-2 2xl:col-span-1">
                        <div class="relative inline-block w-20 h-20 rounded-full shadow-md bg-slate-100 profile-user xl:w-28 xl:h-28">
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo"
                            class="object-cover border-0 rounded-full img-thumbnail user-profile-image">
                            {{-- <div
                                class="absolute bottom-0 flex items-center justify-center w-8 h-8 rounded-full ltr:right-0 rtl:left-0 profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="hidden profile-img-file-input">
                                <label for="profile-img-file-input"
                                    class="flex items-center justify-center w-8 h-8 bg-white rounded-full shadow-lg cursor-pointer dark:bg-zink-600 profile-photo-edit">
                                    <i data-lucide="image-plus"
                                        class="w-4 h-4 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>
                                </label>
                            </div> --}}
                        </div>
                    </div><!--end col-->
                    <div class="lg:col-span-10 2xl:col-span-9">
                        <h5 class="mb-1">{{$company->name}} <i data-lucide="badge-check"
                                class="inline-block w-4 h-4 text-sky-500 fill-sky-100 dark:fill-custom-500/20"></i></h5>
                        <div class="flex gap-3 mb-4">
                            <p class="text-slate-500 dark:text-zink-200"><i data-lucide="map-pin"
                                    class="inline-block w-4 h-4 ltr:mr-1 rtl:ml-1 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>
                                    {{$company->address}}</p>
                        </div>
                    </div>
                </div><!--end grid-->
            </div>

            <ul class="flex flex-wrap w-full text-sm font-medium text-center nav-tabs">

                <li class="@if(isset($title) && $title === __('company_info')) group active @else group @endif">
                    <a href="{{ route('companies.index') }}" data-tab-toggle data-target="company_info"
                        class="inline-block px-4 w-full py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">Company Info</a>
                </li>

                <li class="@if(isset($title) && ($title === __('department') || $title === __('sub_department') ||
                            $title === __('position') || $title === __('grade'))) group active @else group @endif">
                    <a href="{{ route('departments.index') }}" data-tab-toggle data-target="currency"
                        class="inline-block px-4 w-full py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:bg-custom-500 group-[.active]:text-white hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">Department</a>
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