<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BankController;
use App\Http\Controllers\Api\V1\LoanController;
use App\Http\Controllers\Api\V1\RoleController;
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
use App\Http\Controllers\Api\V1\ModelHasPermissionController;
use App\Http\Controllers\Api\V1\ShiftAllowanceTypeController;
use App\Http\Controllers\Api\V1\OverTimeCalculationController;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Api\V1\AllowanceTransactionController;
use App\Http\Controllers\Api\V1\DeductionTransactionController;
use App\Http\Controllers\Api\V1\ShiftAllowanceCalculationController;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

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
            Route::apiResource('users', TenantUserController::class);

            // Route::apiResource('users', UserController::class);
            // Route::get('/users', [UserController::class,'index'])->middleware('can:user_index');
            // Route::post('/users', [UserController::class,'store']);
            // Route::post('/users', [UserController::class,'store'])->middleware('can:user_store');
            // Route::get('/users/{user}', [UserController::class,'show'])->middleware('can:user_show');
            // Route::put('/users/{user}', [UserController::class,'update'])->middleware('can:user_update');
            // Route::delete('/users/{user}', [UserController::class,'destroy'])->middleware('can:user_destroy');

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
            Route::get('/employees/list-with-less', [EmployeeController::class, 'employeeListWithLess']);

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
            // Route::apiResource('roles-and-permissions', ModelHasPermissionController::class);
            Route::apiResource('salary-managements', SalaryManagementController::class);
            Route::apiResource('deduction-types', DeductionTypeController::class);
            Route::apiResource('deductions', DeductionController::class);
            Route::apiResource('payrolls', PayrollController::class);
            Route::apiResource('deduction-transactions', DeductionTransactionController::class);
            Route::apiResource('shift-allowance-types', ShiftAllowanceTypeController::class);
            Route::apiResource('shift-allowance-calculations', ShiftAllowanceCalculationController::class);

            //Permission And Role Routes
            Route::post('/user-grant-permission/{userId}', [PermissionController::class, 'grantPermission']);
            Route::post('/user-revoke-permission/{userId}', [PermissionController::class, 'revokePermission']);
            Route::get('/user-permissions/{userId}', [PermissionController::class, 'getUserPermissions']);

            Route::post('/user-grant-role/{userId}', [RoleController::class, 'grantrole']);
            Route::post('/user-revoke-role/{userId}', [RoleController::class, 'revokerole']);
            Route::get('/user-role/{userId}', [RoleController::class, 'getUserroles']);
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

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::resource('users', TenantUserController::class);

    require __DIR__ . '/tenant_auth.php';
});
