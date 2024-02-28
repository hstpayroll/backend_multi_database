@extends('tenants.finance.Department-Section.index')

@section('department')
    <div class="px-6">
        <div class="flex items-center gap-3 mb-4">
            <h6 class="text-15 grow">Sub-Department</h6>
            <div class="shrink-0">
                <a href="#!" data-modal-target="AddtsubDepartment" type="button"
                    class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                        data-lucide="plus" class="inline-block w-4 h-4"></i>
                        <span class="align-middle">Add Sub-Department</span>
                </a>
            </div>
        </div>

        <div class="overflow-x-auto mt-8">
            <table class="w-full whitespace-nowrap">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">ID</th>
                        <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">Department Name</th>
                        <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">Sub Department Name</th>
                        <th class="px-3.5 py-2.5 font-semibold border border-slate-200 dark:border-zink-500">Action</th>
                    </tr>
                </thead>
                <tbody class="">

                    @foreach($subDepartments as $subdepartment)
                        <tr>
                            <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">{{ $loop->iteration }}</td>
                            <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">{{$subdepartment->department->name}}</td>
                            <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">{{$subdepartment->name}}</td>
                            <td class="px-3.5 py-2.5 border border-slate-200 dark:border-zink-500">
                                <div class="flex gap-2">
                                    <a href="#!" data-modal-target="EditsubDepartment{{$subdepartment->id}}"
                                        class="flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 text-slate-500 hover:text-custom-500 hover:bg-custom-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:bg-custom-500/20 dark:hover:text-custom-500"><i
                                            data-lucide="pencil" class="w-4 h-4"></i></a>
                                    <a href="#!" data-modal-target="deletesubdepartment{{$subdepartment->id}}"
                                        class="flex items-center justify-center w-8 h-8 transition-all duration-200 ease-linear rounded-md bg-slate-100 text-slate-500 hover:text-red-500 hover:bg-red-100 dark:bg-zink-600 dark:text-zink-200 dark:hover:text-red-500 dark:hover:bg-red-500/20"><i
                                            data-lucide="trash-2" class="w-4 h-4"></i></a>
                                </div>
                            </td>
                        </tr>
                        @include('tenants.finance.Department-Section.sub-department.delete')
                        @include('tenants.finance.Department-Section.sub-department.edit')
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex flex-col items-center gap-4 px-4 mt-4 md:flex-row" id="pagination-element">
            <div class="grow">
                <p class="text-slate-500 dark:text-zink-200">
                    Showing <b class="showing">{{ $subDepartments->firstItem() }}</b> to
                    <b class="showing">{{ $subDepartments->lastItem() }}</b> of
                    <b class="total-records">{{ $subDepartments->total() }}</b> Results
                </p>
            </div>

            <div class="col-sm-auto mt-sm-0">
                {{ $subDepartments->links() }}
            </div>
        </div>
        @include('tenants.finance.Department-Section.sub-department.create')
    </div>
@endsection