@extends('tenants.finance.Common.Company-Management')

@section('body')
 
    <div class="card">
        <div class="card-body">
            <div class="tabs-container border-l border-r border-b border-slate-200 dark:border-zink-500 p-4">          

                <ul class="flex flex-wrap w-full text-sm font-medium text-center border-b border-slate-200 dark:border-zink-500 nav-tabs mb-6">
                    <li class="@if($title=='department') group active @else group @endif">
                        <a href="{{route('departments.index')}}" data-tab-toggle data-target="department"
                            class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">Department</a>
                    </li>
                    <li class="@if($title=='sub_department') group active @else group @endif">
                        <a href="{{route('sub_departments.index')}}" data-tab-toggle data-target="sub-department"
                            class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">Sub-Department</a>
                    </li>
                    <li class="@if($title=='position') group active @else group @endif">
                        <a href="{{route('positions.index')}}" data-tab-toggle data-target="position"
                            class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">Position</a>
                    </li>
                    <li class="@if($title=='grade') group active @else group @endif">
                        <a href="{{route('grades.index')}}" data-tab-toggle data-target="grade"
                            class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">Grades</a>
                    </li>
                </ul>
                <div class="tab-content">
                    @yield('department')
                </div>
            </div>
        </div>
    </div>
    
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tabs = document.querySelectorAll('.nav-tabs li a');
    
            tabs.forEach(function(tab) {
                tab.addEventListener('click', function() {
                    // Get the data-target attribute value from the clicked tab
                    var target = this.getAttribute('data-target');
                    tabs.forEach(function(t) {
                        t.parentElement.classList.remove('active');
                    });
    
                    // Add 'active' class to the clicked tab's parent li element
                    this.parentElement.classList.add('active');
    
                    // Hide all content containers
                    var contentContainers = document.querySelectorAll('.tab-content');
                    contentContainers.forEach(function(container) {
                        container.classList.add('hidden');
                    });
    
                    // Show the content container based on the target
                    var targetContainer = document.getElementById(target);
                    if (targetContainer) {
                        targetContainer.classList.remove('hidden');
                    }
                });
            });
        });
    </script> --}}
    

@endsection