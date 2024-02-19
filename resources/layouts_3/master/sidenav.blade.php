<div class="page-content d-flex align-items-stretch">
    <!-- Side Navbar -->
    <nav class="side-navbar z-index-40">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center py-4 px-3">
            <img class="avatar shadow-0 img-fluid rounded-circle" src="{{ asset('img/avatar-1.jpg') }}"
                alt="{{ Auth::user()->name ?? '' }}" />
            <div class="ms-3 title">

                @auth
                    <h1 class="h4 mb-2 text-capitalize">{{ Auth::user()->name }}</h1>
                    <p class="text-sm text-gray-500 fw-light mb-0 lh-1 text-uppercase">
                        {{ str_replace(['[', ']', '"'], ' ', Auth::user()->getRoleNames()) }}</p>
                @endauth
            </div>
        </div>
        <!-- Sidebar Navidation Menus-->

        <ul class="list-unstyled py-4">

            @hasanyrole('superadmin')
                <span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Super Admin</span>

                <li class="sidebar-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('home') }}">
                        <i class="fas fa-home blue"></i>
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        </svg>Home </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('home') }}">
                        <i class="fas fa-home blue"></i>
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                        </svg>Role </a>
                </li>
            @endhasanyrole

            @hasanyrole('admin')
                <span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Admin</span>

                <li class="sidebar-item  {{ request()->routeIs('currencies.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="#">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Currencies</a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('exchanges.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="#">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Exchage Rate</a>
                </li>

                <li class="sidebar-item  {{ request()->routeIs('payrollname.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="#">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Payroll Name</a>
                </li>

                <li class="sidebar-item  {{ request()->routeIs('incometax.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="#">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Income Tax</a>
                </li>

                <li class="sidebar-item  {{ request()->routeIs('banks.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('banks.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Bank
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('branches.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('branches.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Branchess
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('calendars.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('calendars.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Calender
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('companies.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('companies.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Companies
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('employment-types.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('employment-types.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>employment_types
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('payroll-names.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('payroll-names.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Payroll Name
                    </a>
                </li>

                <li class="sidebar-item  {{ request()->routeIs('income-taxes.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('income-taxes.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Income Tax
                    </a>
                </li>

                <li class="sidebar-item  {{ request()->routeIs('payroll-periods.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('payroll-periods.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Payroll Periods
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('currencies.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('currencies.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Currencies
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('exchange-rates.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('exchange-rates.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Exchange Rate
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('employee-pensions.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('employee-pensions.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Employee Pension
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('company-pensions.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('company-pensions.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Company Pension
                    </a>
                </li>
            @endhasanyrole

            @hasanyrole(['superadmin', 'admin', 'user'])
                <li class="sidebar-item  {{ request()->routeIs('tax-regions.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('tax-regions.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Tax Region
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('grades.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('grades.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Grades
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('departments.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('departments.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Department
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('sub-departments.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('sub-departments.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Sub Department
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('positions.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('positions.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Positions
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('citizenships.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('citizenships.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>citizenships
                    </a>
                </li>


                <li class="sidebar-item  {{ request()->routeIs('employees.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('employees.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Employees
                    </a>
                </li>

                <li class="sidebar-item  {{ request()->routeIs('salary-managements.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('salary-managements.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Salery
                        Management
                    </a>
                </li>


                <li class="sidebar-item  {{ request()->routeIs('over-time-types.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('over-time-types.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Over Time Type
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('over-time-calculations.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('over-time-calculations.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Over Time
                        Calculation
                    </a>
                </li>

                <li class="sidebar-item  {{ request()->routeIs('payroll-types.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('payroll-types.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Payroll Type
                    </a>
                </li>

                <li class="sidebar-item  {{ request()->routeIs('cost-centers.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('cost-centers.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Cost Center
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('loan-types.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('loan-types.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Loan Type
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('loans.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('loans.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Loan
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('loan-payment-records.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('loan-payment-records.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Loan Repayment
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('main-allowances.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('main-allowances.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Main Allowance
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('allowance-types.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('allowance-types.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>allowance_types
                    </a>
                </li>
                <li class="sidebar-item  {{ request()->routeIs('allowance-transactions.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('allowance-transactions.index') }}">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                            svg-icon-heavy"></svg>Allowance
                        Transactions
                    </a>
                </li>

                <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown"
                        data-bs-toggle="collapse">
                        <i class="fas fa-caret-down"></i>
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                            <use xlink:href="#browser-window-1"> </use>

                        </svg>Report </a>
                    <ul class="collapse list-unstyled " id="exampledropdownDropdown">
                        <li class="sidebar-item  {{ request()->routeIs('psr.index') ? 'active' : '' }}">
                            <a class="sidebar-link" href="#">
                                <i class="fas fa-calculator"></i>
                                <svg
                                    class="svg-icon svg-icon-sm
                                    svg-icon-heavy"></svg>Payroll
                                Sheet</a>
                        </li>

                        <li
                            class="sidebar-item  {{ request()->routeIs('income-tax-declaration.index') ? 'active' : '' }}">
                            <a class="sidebar-link" href="#">
                                <i class="fas fa-calculator"></i>
                                <svg
                                    class="svg-icon svg-icon-sm
                                    svg-icon-heavy"></svg>Income
                                Tax Declaration</a>
                        </li>
                        <li class="sidebar-item  {{ request()->routeIs('bank-transfer.index') ? 'active' : '' }}">
                            <a class="sidebar-link" href="#">
                                <i class="fas fa-calculator"></i>
                                <svg
                                    class="svg-icon svg-icon-sm
                                    svg-icon-heavy"></svg>Bank
                                Tranfer</a>
                        </li>
                        <li class="sidebar-item  {{ request()->routeIs('payroll-department.index') ? 'active' : '' }}">
                            <a class="sidebar-link" href="#">
                                <i class="fas fa-calculator"></i>
                                <svg
                                    class="svg-icon svg-icon-sm
                                    svg-icon-heavy"></svg>Payroll
                                By Department</a>
                        </li>
                    </ul>
                </li>
            @endhasanyrole
            @hasanyrole('user')
                <li class="sidebar-item  {{ request()->routeIs('incometax.index') ? 'active' : '' }}">
                    <a class="sidebar-link" href="#">
                        <i class="fab fa-btc blue"></i>
                        <svg class="svg-icon svg-icon-sm
                    svg-icon-heavy"></svg>User Details</a>
                </li>
            @endhasanyrole
        </ul>
    </nav>
