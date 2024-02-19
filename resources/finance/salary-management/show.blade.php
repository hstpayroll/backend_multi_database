@extends('layouts_3.master.app')

@section('template_title')
    {{ $salaryManagement->name ?? "{{ __('Show') Salary Management" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Salary Management</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('salary-managements.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $salaryManagement->employee->full_name }}
                        </div>
                        <div class="form-group">
                            <strong>Reason:</strong>
                            {{ $salaryManagement->reason }}
                        </div>
                        <div class="form-group">
                            <strong>Old Salary:</strong>
                            {{ $salaryManagement->old_salary }}
                        </div>
                        <div class="form-group">
                            <strong>New Salary:</strong>
                            {{ $salaryManagement->new_salary }}
                        </div>
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            {{ $salaryManagement->start_date }}
                        </div>
                        <div class="form-group">
                            <strong>End Date:</strong>
                            {{ $salaryManagement->end_date }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $salaryManagement->description }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $salaryManagement->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
