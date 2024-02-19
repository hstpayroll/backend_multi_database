@extends('layouts_3.master.app')

@section('template_title')
    {{ $payrollPeriod->name ?? "{{ __('Show') Payroll Period" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Payroll Period</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('payroll-periods.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Income Tax Id:</strong>
                            {{ $payrollPeriod->income_tax_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $payrollPeriod->name }}
                        </div>
                        <div class="form-group">
                            <strong>Year:</strong>
                            {{ $payrollPeriod->year }}
                        </div>
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            {{ $payrollPeriod->start_date }}
                        </div>
                        <div class="form-group">
                            <strong>End Date:</strong>
                            {{ $payrollPeriod->end_date }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $payrollPeriod->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
