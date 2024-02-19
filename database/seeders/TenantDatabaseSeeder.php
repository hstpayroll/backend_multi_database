<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TenantRoleSeeder::class);
        $this->call(TenantPermissionSeeder::class);
        $this->call(TenantUserSeeder::class);

        $this->call(TaxRegionSeeder::class);
        $this->call(CitizenshipSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(CalendarSeeder::class);
        $this->call(CompanySeeder::class);

        $this->call(GradeSeeder::class);
        $this->call(OverTimeTypeSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(DepartmentSeeder::class);

        $this->call(SubDepartmentSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(PayrollTypeSeeder::class);
        $this->call(PayrollNameSeeder::class);
        $this->call(FiscalYearSeeder::class);
        $this->call(PayrollPeriodSeeder::class);
        $this->call(IncomeTaxSeeder::class);
        $this->call(EmploymentTypeSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(EmployeePensionSeeder::class);
        $this->call(CompanyPensionSeeder::class);
        $this->call(LoanTypeSeeder::class);
        $this->call(MainAllowanceSeeder::class);
    }
}
