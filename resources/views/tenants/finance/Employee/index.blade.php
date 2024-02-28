@extends('tenants.finance.Common.Employee-Management')

@section('body')


<div class="card">
    <div class="card-body">

        @if (session('updating'))
            @if ($errors->any())
                <div class="alert alert-danger flex items-center justify-center">
                    <div class="px-4 py-3 text-sm text-red-500 border border-transparent rounded-md bg-red-50 dark:bg-red-400/20">
                        <span class="font-bold">ERROR!!!</span><br>
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span><br>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif

        <div class="grid grid-cols-1 gap-x-5 xl:grid-cols-12">
            <div class="xl:col-span-12">
                <div class="card" id="employeeTable">
                    <div class="card-body">
                        <div class="flex items-center">
                            <h6 class="text-15 grow">Employee List</h6>
                        </div>
                    </div>
                    <div class="!py-3.5 card-body border-y border-dashed border-slate-200 dark:border-zink-500">
                        <form action="#!">
                            <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                                <div class="relative xl:col-span-2">
                                    <input type="text"
                                        class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        placeholder="Search for name, email, phone number etc..." autocomplete="off">
                                    <i data-lucide="search"
                                        class="inline-block w-4 h-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                                </div><!--end col-->
                                <div class="xl:col-span-2">
                                    <select
                                        class="form-select border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        data-choices id="choices-single-default">
                                        <option value="">Select Status</option>
                                        <option value="Verified">Verified</option>
                                        <option value="Waiting">Waiting</option>
                                        <option value="Rejected">Rejected</option>
                                        <option value="Hidden">Hidden</option>
                                    </select>
                                </div><!--end col-->
                                <div class="xl:col-span-3 xl:col-start-10">
                                    <div class="flex gap-2 xl:justify-end">
                                        <div>
                                            <button type="button"
                                                class="bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i
                                                    data-lucide="download" class="inline-block w-4 h-4"></i> <span
                                                    class="align-middle">Import</span></button>
                                        </div>
                                        <div>
                                            <button type="button"
                                                class="bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i
                                                    data-lucide="upload" class="inline-block w-4 h-4"></i> <span
                                                    class="align-middle">Export</span></button>
                                        </div>
                                        <div>
                                            <button type="button"
                                                class="bg-white border-dashed text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20"><i
                                                    data-lucide="plus" class="inline-block w-4 h-4"></i> <span
                                                    class="align-middle">Add Employee</span></button>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end grid-->
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="-mx-5 -mb-5 overflow-x-auto">
                            <table class="w-full border-separate table-custom border-spacing-y-1 whitespace-nowrap">
                                <thead class="text-left">
                                    <tr
                                        class="relative rounded-md bg-slate-100 dark:bg-zink-600 after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">
                                            <div class="flex items-center h-full">
                                                <input id="CheckboxAll"
                                                    class="w-4 h-4 bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800 cursor-pointer"
                                                    type="checkbox">
                                            </div>
                                        </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="employee-id">
                                            Employee ID </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="name">
                                            Name </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="gender">
                                            Gender </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="birth-date">
                                            Birth Date </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="hired-date">
                                            Hired Date </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="tax-region">
                                            Tax Region </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="grade">
                                            Grade </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="department">
                                            Department </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="subdepartment">
                                            Sub Department </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="position">
                                            Position </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="employement-type">
                                            Employement Type </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="citizenship">
                                            Citizenship </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="email">
                                            Email </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="bank-name">
                                            Bank Name </th>
                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold sort" data-sort="acc-numbr">
                                            Account Number </th>

                                        <th class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($employees as $employee)
                                @php $sex = ($employee->sex == 1) ? 'male' : 'female'; @endphp
                                    <tr
                                        class="relative rounded-md after:absolute ltr:after:border-l-2 rtl:after:border-r-2 ltr:after:left-0 rtl:after:right-0 after:top-0 after:bottom-0 after:border-transparent [&.active]:after:border-custom-500 [&.active]:bg-slate-100 dark:[&.active]:bg-zink-600">
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            <div class="flex items-center h-full">
                                                <input id="Checkbox1"
                                                    class="w-4 h-4 bg-white border border-slate-200 checked:bg-none dark:bg-zink-700 dark:border-zink-500 rounded-sm appearance-none arrow-none relative after:absolute after:content-['\eb7b'] after:top-0 after:left-0 after:font-remix after:leading-none after:opacity-0 checked:after:opacity-100 after:text-custom-500 checked:border-custom-500 dark:after:text-custom-500 dark:checked:border-custom-800 cursor-pointer"
                                                    type="checkbox">
                                            </div>
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5"><a href="#!"
                                                class="transition-all duration-150 ease-linear text-custom-500 hover:text-custom-600 employee-id">{{$employee->emp_id}}</a>
                                        </td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 name">{{$employee->first_name}} {{$employee->father_name}} {{$employee->gfather_name}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 gender">{{$sex}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 birth-date">{{$employee->birth_date}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 hired-date">{{$employee->hired_date}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 tax-region">{{$employee->taxregion->name}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 grade">{{$employee->grade->name}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 department">{{$employee->department->name}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 sub-department">{{$employee->subdepartment->name}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 position">{{$employee->position->name}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 employement-type">{{$employee->employmenttype->name}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 citizenship">{{$employee->citizenship->name}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 email">{{$employee->email}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 bank-name">{{$employee->bank->name}}</td>
                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 acount-number">{{$employee->account_number}}</td>

                                        <td class="px-3.5 py-2.5 first:pl-5 last:pr-5">
                                            <div class="relative dropdown">
                                                <button
                                                    class="flex items-center justify-center w-[30px] h-[30px] dropdown-toggle p-0 text-slate-500 btn bg-slate-100 hover:text-white hover:bg-slate-600 focus:text-white focus:bg-slate-600 focus:ring focus:ring-slate-100 active:text-white active:bg-slate-600 active:ring active:ring-slate-100 dark:bg-slate-500/20 dark:text-slate-400 dark:hover:bg-slate-500 dark:hover:text-white dark:focus:bg-slate-500 dark:focus:text-white dark:active:bg-slate-500 dark:active:text-white dark:ring-slate-400/20"
                                                    id="usersAction1" data-bs-toggle="dropdown"><i
                                                        data-lucide="more-horizontal" class="w-3 h-3"></i></button>
                                                <ul class="absolute z-50 hidden py-2 mt-1 ltr:text-left rtl:text-right list-none bg-white rounded-md shadow-md dropdown-menu min-w-[10rem] dark:bg-zink-600"
                                                    aria-labelledby="usersAction1">
                                                    <li>
                                                        <a class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                            href="{{ url('pages-account') }}"><i data-lucide="eye"
                                                                class="inline-block w-3 h-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                                class="align-middle">Overview</span></a>
                                                    </li>
                                                    <li>
                                                        <a data-modal-target="addUserModal"
                                                            class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                            href="#!"><i data-lucide="file-edit"
                                                                class="inline-block w-3 h-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                                class="align-middle">Edit</span></a>
                                                    </li>
                                                    <li>
                                                        <a data-modal-target="deleteModal"
                                                            class="block px-4 py-1.5 text-base transition-all duration-200 ease-linear text-slate-600 dropdown-item hover:bg-slate-100 hover:text-slate-500 focus:bg-slate-100 focus:text-slate-500 dark:text-zink-100 dark:hover:bg-zink-500 dark:hover:text-zink-200 dark:focus:bg-zink-500 dark:focus:text-zink-200"
                                                            href="#!"><i data-lucide="trash-2"
                                                                class="inline-block w-3 h-3 ltr:mr-1 rtl:ml-1"></i> <span
                                                                class="align-middle">Delete</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach    
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="py-6 text-center">
                                    <i data-lucide="search"
                                        class="w-6 h-6 mx-auto text-sky-500 fill-sky-100 dark:fill-sky-500/20"></i>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 199+ users We
                                        did not find any users for you search.</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="flex flex-col items-center gap-4 px-4 mt-4 md:flex-row" id="pagination-element">
                            <div class="grow">
                                <p class="text-slate-500 dark:text-zink-200">
                                    Showing <b class="showing">{{ $employees->firstItem() }}</b> to
                                    <b class="showing">{{ $employees->lastItem() }}</b> of
                                    <b class="total-records">{{ $employees->total() }}</b> Results
                                </p>
                            </div>
                    
                            <div class="col-sm-auto mt-sm-0">
                                {{ $employees->links() }}
                            </div>
                        </div>

                    </div>
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end grid-->


    </div>
</div>

@endsection