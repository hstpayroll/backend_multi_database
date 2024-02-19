@extends('layouts_3.master.app')

@section('template_title')
    {{ $payrollName->name ?? "{{ __('Show') Payroll Name" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Payroll Name</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('payroll-names.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $payrollName->name }}
                        </div>
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            {{ $payrollName->start_date }}
                        </div>
                        <div class="form-group">
                            <strong>End Date:</strong>
                            {{ $payrollName->end_date }}
                        </div>
                        <div class="form-group">
                            <strong>Details:</strong>
                            {{ $payrollName->details }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $payrollName->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
