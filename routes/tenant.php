<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BankController;
use App\Http\Controllers\Api\V1\LoanController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\GradeController;
use App\Http\Controllers\Api\V1\BranchController;
use App\Http\Controllers\Api\V1\CompanyController;
use App\Http\Controllers\Api\V1\PayrollController;
use App\Http\Controllers\Api\V1\CalendarController;
use App\Http\Controllers\Api\V1\CurrencyController;
use App\Http\Controllers\Api\V1\EmployeeController;
use App\Http\Controllers\Api\V1\LoanTypeController;
use App\Http\Controllers\Api\V1\PositionController;
use App\Http\Controllers\Api\v1\DeductionController;
use App\Http\Controllers\Api\V1\IncomeTaxController;
use App\Http\Controllers\Api\V1\TaxRegionController;
use App\Http\Controllers\Api\V1\CostCenterController;
use App\Http\Controllers\Api\V1\DepartmentController;
use App\Http\Controllers\Api\V1\FiscalYearController;
use App\Http\Controllers\Api\V1\PermissionController;
use App\Http\Controllers\Api\V1\TenantRoleController;
use App\Http\Controllers\Api\V1\TenantUserController;
use App\Http\Controllers\Api\V1\CitizenshipController;
use App\Http\Controllers\Api\V1\PayrollNameController;
use App\Http\Controllers\Api\V1\PayrollTypeController;
use App\Http\Controllers\Api\V1\OverTimeTypeController;
use App\Http\Controllers\Api\V1\AllowanceTypeController;
use App\Http\Controllers\Api\v1\DeductionTypeController;
use App\Http\Controllers\Api\V1\MainAllowanceController;
use App\Http\Controllers\Api\V1\PayrollPeriodController;
use App\Http\Controllers\Api\V1\SubDepartmentController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use App\Http\Controllers\Api\V1\CompanyPensionController;
use App\Http\Controllers\Api\V1\CompanySettingController;
use App\Http\Controllers\Api\V1\EmploymentTypeController;
use App\Http\Controllers\Api\V1\PayslipSettingController;
use App\Http\Controllers\Api\V1\EmployeePensionController;
use App\Http\Controllers\Api\V1\SalaryManagementController;
use App\Http\Controllers\Api\V1\LoanPaymentRecordController;
use App\Http\Controllers\Api\V1\ShiftAllowanceTypeController;
use App\Http\Controllers\Api\V1\OverTimeCalculationController;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Api\V1\AllowanceTransactionController;
use App\Http\Controllers\Api\V1\DeductionTransactionController;
use App\Http\Controllers\Api\V1\ShiftAllowanceCalculationController;


Route::middleware([
    'api',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class
])->prefix('api/v1')->group(function () {
    //
    require __DIR__ . '/tenant_api_auth.php';
    Route::name('api.')
        ->middleware('auth:sanctum')
        ->group(function () {
            Route::get('auth-user-tenant', [TenantUserController::class, 'auth_user_tenant']);
            Route::post('users/assign-role/{user}', [TenantUserController::class, 'assignRole'])->name('users.assign-role');
            Route::post('users/remove-role/{user}', [TenantUserController::class, 'removeRole'])->name('users.remove-role');

            Route::apiResource('users', TenantUserController::class);
            Route::apiResource('roles', TenantRoleController::class);
            Route::apiResource('permissions', PermissionController::class);

            Route::apiResource('currencies', CurrencyController::class); //
            Route::apiResource('banks', BankController::class);
            Route::apiResource('calendars', CalendarController::class);
            Route::apiResource('companies', CompanyController::class);
            Route::apiResource('employment-types', EmploymentTypeController::class);
            Route::apiResource('payroll-names', PayrollNameController::class);
            Route::apiResource('income-taxes', IncomeTaxController::class);
            Route::apiResource('fiscal-years', FiscalYearController::class);
            Route::apiResource('cost-centers', CostCenterController::class);
            Route::apiResource('payroll-periods', PayrollPeriodController::class);
            Route::apiResource('departments', DepartmentController::class);
            Route::apiResource('sub-departments', SubDepartmentController::class);
            Route::apiResource('tax-regions', TaxRegionController::class);
            Route::apiResource('grades', GradeController::class);
            Route::apiResource('citizenships', CitizenshipController::class);
            Route::apiResource('positions', PositionController::class);
            Route::apiResource('payroll-types', PayrollTypeController::class);

            Route::get('employee-department', [EmployeeController::class, 'employeeDepartment'])->name('employee-department');
            Route::get('employee-position', [EmployeeController::class, 'employeePosition'])->name('employee-position');
            Route::get('employees/list-with-less', [EmployeeController::class, 'employeeListWithLess'])->name('employees.list-with-less');
            Route::get('employees/refactor-employee-list', [EmployeeController::class, 'refactorEmployeeList'])->name('employees.refactor-employee-list');

            Route::apiResource('employees', EmployeeController::class);
            Route::get('loans_by_employee/{employee_id}', [LoanController::class, 'showLoansByEmployee']);
            Route::apiResource('loans', LoanController::class);
            Route::apiResource('loan-types', LoanTypeController::class);
            Route::get('loan_payment_records_by_employee/{employee_id}', [LoanPaymentRecordController::class, 'showRecordsByEmployee']);
            Route::get('show_loan_payment_by_loan/{loan_id}', [LoanPaymentRecordController::class, 'showLoanPaymentByLoan']);
            Route::apiResource('loan-payment-records', LoanPaymentRecordController::class);
            Route::apiResource('main-allowances', MainAllowanceController::class);
            Route::apiResource('allowance-types', AllowanceTypeController::class);

            Route::get('allowance-transaction-by-employee', [AllowanceTransactionController::class, 'allowanceTransactionByEmployee'])->name('allowance-transaction-by-employee');
            Route::apiResource('allowance-transactions', AllowanceTransactionController::class);
            Route::apiResource('employee-pensions', EmployeePensionController::class);
            Route::apiResource('company-pensions', CompanyPensionController::class);
            Route::apiResource('overtime-types', OverTimeTypeController::class);

            Route::get('overtime_calculation_by_employee/{employee_id}', [OverTimeCalculationController::class, 'showOvetimeCalculationByEmployee']);


            Route::apiResource('over-time-calculations', OverTimeCalculationController::class);
            Route::apiResource('company-settings', CompanySettingController::class);
            Route::apiResource('payslip-settings', PayslipSettingController::class);
            Route::apiResource('branches', BranchController::class);
            Route::apiResource('salary-managements', SalaryManagementController::class);
            Route::apiResource('deduction-types', DeductionTypeController::class);
            Route::apiResource('deductions', DeductionController::class);
            Route::apiResource('payrolls', PayrollController::class);
            Route::apiResource('deduction-transactions', DeductionTransactionController::class);
            Route::apiResource('shift-allowance-types', ShiftAllowanceTypeController::class);

            Route::get('shift-allowance-calculation-by-employee/{employee_id}', [ShiftAllowanceCalculationController::class, 'showShiftAllowanceCalculationByEmployee'])->name('shift-allowance-calculation-by-employee');

            Route::apiResource('shift-allowance-calculations', ShiftAllowanceCalculationController::class);
        });
});

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return view('tenants.auth.login');
    });
    Route::get('/dashboard', function () {
        return view('tenants.index');
    })->middleware(['auth', 'verified'])->name('dashboard');

    require __DIR__ . '/tenant_auth.php';
});
