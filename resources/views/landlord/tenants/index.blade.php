@extends('layouts.master')
@section('title')
    {{ __('Tenants') }}
@endsection
@section('content')
    <x-page-title title="Tenants" pagetitle="HR Management" />

    <div class="card" id="ordersTable">
        <div class="card-body">
            <div class="flex items-center gap-3 mb-4">
                <h6 class="text-15 grow"> {{ __('Tenants') }}</h6>
                <div class="shrink-0">
                    <a href="#" data-modal-target="addTenantModal" type="button"
                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                            data-lucide="plus" class="inline-block w-4 h-4"></i> <span class="align-middle">
                            {{ __('Add Tenants') }} </span></a>
                </div>
            </div>
            <div class="overflow-x-auto">

                @if(session()->has('success'))
                    <div class="alert alert-success flex items-center justify-center">
                        <div
                            class="px-4 py-3 text-sm text-green-500 border border-transparent rounded-md bg-green-50 dark:bg-green-400/20">
                            <span class="font-bold">SUCCESS!!!</span> {{ session('success') }}
                        </div>
                    </div>            
                @elseif(session()->has('error'))
                    <div class="alert alert-danger flex items-center justify-center">
            
                        <div
                            class="px-4 py-3 text-sm text-red-500 border border-transparent rounded-md bg-red-50 dark:bg-red-400/20">
                            <span class="font-bold">ERROR!!!</span> {{ session('error') }}
                        </div>
                        
                    </div>
                @endif

                <table class="w-full whitespace-nowrap">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">#</th>
                            <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                {{ __(' Tenants Name') }} </th>
                            <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                {{ __('Email') }}</th>

                            <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                {{ __('domain') }}</th>

                            <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                {{ __('Database Name') }}</th>

                            <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr>
                            @forelse ($tenants as $tenant)
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500"> {{ $loop->iteration }}</td>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">{{ $tenant->name }} </td>

                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">{{ $tenant->email }} </td>

                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    @foreach ($tenant->domains as $domain)
                                        <a href="http://{{ $domain->domain }}:8000" target="_blank" class="hover:shadow-lg hover:text-5xl">{{ $domain->domain }}</a>
                                    @endforeach
                                </td>

                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">tenat_{{ $tenant->id }} </td>

                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    <div class="flex gap-2">
                                        <a href="#!" data-modal-target="updateModal{{ $tenant->id }}"
                                            class="flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 dark:bg-zink-600 dark:text-zink-200 text-slate-500 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/20"><i
                                                data-lucide="pencil" class="w-4 h-4"></i></a>
                                        <a href="#!" data-modal-target="deleteModal{{ $tenant->id }}"
                                            class="flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 dark:bg-zink-600 dark:text-zink-200 text-slate-500 hover:text-red-500 dark:hover:text-red-500 hover:bg-red-100 dark:hover:bg-red-500/20"><i
                                                data-lucide="trash-2" class="w-4 h-4"></i></a>
                                    </div>
                                </td>
                        </tr>
                        
                        <div id="updateModal{{ $tenant->id }}" modal-center
        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="flex items-center justify-between p-4 border-b dark:border-zink-500">
                <h5 class="text-16">{{ __(' Update Tenant') }}</h5>
                <button data-modal-close="updateModal{{ $tenant->id }}"
                    class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x"
                        class="w-5 h-5"></i>
                </button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <form action="{{ route('tenants.update', $tenant->id ) }}" >
                    @csrf
                    @method('PUT')
                    @php
                        $Variable = 'PUT';
                    @endphp

                    @include('landlord.tenants.form')   

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" data-modal-close="updateModal{{ $tenant->id }}"
                            class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-600 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{ __(' Cancel') }}</button>
                        <button type="submit"
                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{ __(' Add Tenants') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end update tenants-->

    <div id="deleteModal{{ $tenant->id }}" modal-center
        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                <div class="float-right">
                    <button data-modal-close="deleteModal{{ $tenant->id }}"
                        class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i
                            data-lucide="x" class="w-5 h-5"></i></button>
                </div>
                <img src="{{ URL::asset('build/images/delete.png') }}" alt="" class="block h-12 mx-auto">
                <div class="mt-5 text-center">
                    <h5 class="mb-1">{{ __(' Are you sure?') }}</h5>
                    <p class="text-slate-500 dark:text-zink-200">{{ __(' Are you certain you want to delete this record?') }}</p>
                    <div class="flex justify-center gap-2 mt-6">
                        <button type="reset" data-modal-close="deleteModal{{ $tenant->id }}"
                            class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">{{ __(' Cancel') }}</button>
                        <form action="{{route('tenants.destroy', $tenant->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                            class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Yes,
                            {{ __(' Delete It!') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end delete modal-->
                        
                    @empty
                        <p>{{ __('No data found') }}</p>
                        @endforelse

                    </tbody>
                </table>
            </div>


            <div class="flex flex-col items-center gap-4 px-4 mt-4 md:flex-row" id="pagination-element">
                <div class="grow">
                    <p class="text-slate-500 dark:text-zink-200">
                        Showing <b class="showing">{{ $tenants->firstItem() }}</b> to
                        <b class="showing">{{ $tenants->lastItem() }}</b> of
                        <b class="total-records">{{ $tenants->total() }}</b> Results
                    </p>
                </div>
        
                <div class="col-sm-auto mt-sm-0">
                    {{ $tenants->links() }}
                </div>
            </div>


        </div>
    </div>


    <div id="addTenantModal" modal-center
        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show ">
        <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="flex items-center justify-between p-4 border-b dark:border-zink-500">
                <h5 class="text-16">{{ __(' Add Tenant') }}</h5>
                <button data-modal-close="addTenantModal"
                    class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x"
                        class="w-5 h-5"></i></button>
            </div>
            <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
                <form action="{{route('tenants.store')}}" method="POST">
                    @csrf
                    @php
                        $Variable = 'POST';
                    @endphp

                    @include('landlord.tenants.form')
        
                    <div class="flex justify-end gap-2 mt-4">
                        <button type="reset" data-modal-close="addTenantModal"
                            class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-600 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{ __(' Cancel') }}</button>
                        <button type="submit" data-modal-target="addTenantModal"
                            class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{ __(' Add Tenant') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--end add tenants-->

@endsection

@push('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush