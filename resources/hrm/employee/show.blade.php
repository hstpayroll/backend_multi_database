@extends('layouts_3.master.app')

@section('template_title')
    {{ $employee->name ?? "{{ __('Show') Employee" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Employee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('employees.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Emp Id:</strong>
                            {{ $employee->emp_id }}
                        </div>
                        <div class="form-group">
                            <strong>First Name:</strong>
                            {{ $employee->first_name }}
                        </div>
                        <div class="form-group">
                            <strong>Father Name:</strong>
                            {{ $employee->father_name }}
                        </div>
                        <div class="form-group">
                            <strong>Gfather Name:</strong>
                            {{ $employee->gfather_name }}
                        </div>
                        <div class="form-group">
                            <strong>Sex:</strong>
                            {{ $employee->sex }}
                        </div>
                        <div class="form-group">
                            <strong>Birth Date:</strong>
                            {{ $employee->birth_date }}
                        </div>
                        <div class="form-group">
                            <strong>Hired Date:</strong>
                            {{ $employee->hired_date }}
                        </div>
                        <div class="form-group">
                            <strong>Tin No:</strong>
                            {{ $employee->tin_no }}
                        </div>
                        <div class="form-group">
                            <strong>Cost Center:</strong>
                            {{ $employee->cost_center }}
                        </div>
                        <div class="form-group">
                            <strong>Tax Region Id:</strong>
                            {{ $employee->tax_region_id }}
                        </div>
                        <div class="form-group">
                            <strong>Grade Id:</strong>
                            {{ $employee->grade_id }}
                        </div>
                        <div class="form-group">
                            <strong>Department Id:</strong>
                            {{ $employee->department_id }}
                        </div>
                        <div class="form-group">
                            <strong>Sub Department Id:</strong>
                            {{ $employee->sub_department_id }}
                        </div>
                        <div class="form-group">
                            <strong>Position Id:</strong>
                            {{ $employee->position_id }}
                        </div>
                        <div class="form-group">
                            <strong>Employment Type Id:</strong>
                            {{ $employee->employment_type_id }}
                        </div>
                        <div class="form-group">
                            <strong>Citizenship Id:</strong>
                            {{ $employee->citizenship_id }}
                        </div>
                        <div class="form-group">
                            <strong>Company Id:</strong>
                            {{ $employee->company_id }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $employee->email }}
                        </div>
                        <div class="form-group">
                            <strong>Bank Id:</strong>
                            {{ $employee->bank_id }}
                        </div>
                        <div class="form-group">
                            <strong>Account Number:</strong>
                            {{ $employee->account_number }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $employee->image }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $employee->status }}
                        </div>
                        <div class="form-group">
                            <strong>Comment:</strong>
                            {{ $employee->comment }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
