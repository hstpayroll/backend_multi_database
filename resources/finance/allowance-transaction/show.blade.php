@extends('layouts_3.master.app')

@section('template_title')
    {{ $allowanceTransaction->name ?? "{{ __('Show') Allowance Transaction" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Allowance Transaction</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('allowance-transactions.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Payroll Date:</strong>
                            {{ $allowanceTransaction->payroll_date }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $allowanceTransaction->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>Allowance Type Id:</strong>
                            {{ $allowanceTransaction->allowance_type_id }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $allowanceTransaction->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Taxable Amount:</strong>
                            {{ $allowanceTransaction->taxable_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Non Taxable Amount:</strong>
                            {{ $allowanceTransaction->non_taxable_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Is Day Based:</strong>
                            {{ $allowanceTransaction->is_day_based }}
                        </div>
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            {{ $allowanceTransaction->start_date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
