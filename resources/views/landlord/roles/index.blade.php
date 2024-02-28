@extends('layouts.master')
@section('title')
    {{ __('Roles') }}
@endsection
@section('content')
    <x-page-title title="Roles" pagetitle="Payroll Management" />

    <div class="card" id="ordersTable">
        <div class="card-body">
            <div class="flex items-center gap-3 mb-4">
                <h6 class="text-15 grow"> {{ __('Roles') }}</h6>
                <div class="shrink-0">
                    <a href="{{ route('roles.create') }}"
                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                            data-lucide="plus" class="inline-block w-4 h-4"></i> <span class="align-middle">
                            {{ __('Add Roles') }} </span></a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table id="basic_tables" class="display stripe group" style="width:100%">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr>
                            <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">#</th>
                            <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                {{ __(' Roles Name') }} </th>

                            <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">
                                {{ __('domain') }}</th>
                            <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr>
                            @forelse ($roles as $tenant)
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    {{ $loop->iteration }}</td>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">{{ $tenant->name }}
                                </td>
                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">{{ $tenant->email }}
                                </td>

                                <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                    <div class="flex gap-2">
                                        <a href="{{ route('roles.edit', $tenant) }}"
                                            class="flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 dark:bg-zink-600 dark:text-zink-200 text-slate-500 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/20"><i
                                                data-lucide="pencil" class="w-4 h-4"></i></a>
                                        <a href="#" data-modal-target="deleteModal_{{ $tenant->id }}"
                                            class="flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 dark:bg-zink-600 dark:text-zink-200 text-slate-500 hover:text-red-500 dark:hover:text-red-500 hover:bg-red-100 dark:hover:bg-red-500/20"><i
                                                data-lucide="trash-2" class="w-4 h-4"></i></a>
                                    </div>
                                </td>
                        </tr>
                    @empty
                        <p>{{ __('No data found') }}</p>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div id="deleteModal({{ $tenant->id }}}" modal-center
        class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
        <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
            <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                <div class="float-right">
                    <button data-modal-close="deleteModal_{{ $tenant->id }}"
                        class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i data-lucide="x"
                            class="w-5 h-5"></i></button>
                </div>
                <img src="{{ URL::asset('build/images/delete.png') }}" alt="" class="block h-12 mx-auto">

                <div class="mt-5 text-center">
                    <form method="POST" action="{{ route('roles.destroy', $tenant) }}" x-data>
                        @csrf
                        @method('DELETE')

                        {{-- <button type="submit"
                            class="block ltr:pr-4 rtl:pl-4 py-1.5 text-base font-medium transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:text-custom-500 focus:text-custom-500 dark:text-zink-200 dark:hover:text-custom-500 dark:focus:text-custom-500"
                            @click.prevent="$root.submit();">
                            <i data-lucide="log-out" class="inline-block w-4 h-4 ltr:mr-2 rtl:ml-2"></i>
                            {{ __('Sign Out') }}
                        </button> --}}

                        <h5 class="mb-1">Are you sure?</h5>
                        <p class="text-slate-500 dark:text-zink-200">Are you certain you want to delete this record?</p>
                        <div class="flex justify-center gap-2 mt-6">
                            <button type="reset" data-modal-close="deleteModal_{{ $tenant->id }}"
                                class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Cancel</button>
                            <button type="submit"
                                class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Yes,
                                Delete It!</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div><!--end delete modal-->
@endsection
@push('scripts')
    <script src="{{ URL::asset('build/js/datatables/jquery-3.7.0.js') }}"></script>
    <script src="{{ URL::asset('build/js/datatables/data-tables.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/datatables/data-tables.tailwindcss.min.js') }}"></script>
    <!--buttons dataTables-->
    <script src="{{ URL::asset('build/js/datatables/datatables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/datatables/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/datatables/buttons.print.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/datatables/datatables.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    @section('javascript')
        <script>
            function deleteData(id) {
                var id = id;
                var url = '{{ route('roles.destroy', ':id') }}';

                url = url.replace(':id', id);

                $("#deleteForm").attr('action', url);
            }

            function formSubmit() {
                $("#deleteForm").submit();
            }
        </script>
    @endsection
@endpush
