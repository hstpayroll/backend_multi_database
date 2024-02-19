@extends('layouts_3.master.app')

@section('template_title')
    {{ $loan->name ?? "{{ __('Show') Loan" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Loan</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('loans.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $loan->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>Loan Type Id:</strong>
                            {{ $loan->loan_type_id }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $loan->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            {{ $loan->start_date }}
                        </div>
                        <div class="form-group">
                            <strong>Expected End Date:</strong>
                            {{ $loan->expected_end_date }}
                        </div>
                        <div class="form-group">
                            <strong>Duration Months:</strong>
                            {{ $loan->duration_months }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $loan->description }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $loan->status }}
                        </div>
                        <div class="form-group">
                            <strong>Termination Date:</strong>
                            {{ $loan->termination_date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
