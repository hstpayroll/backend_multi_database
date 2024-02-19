@extends('layouts_3.master.app')

@section('template_title')
    {{ $loanPaymentRecord->name ?? "{{ __('Show') Loan Payment Record" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Loan Payment Record</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('loan-payment-records.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $loanPaymentRecord->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>Loan Id:</strong>
                            {{ $loanPaymentRecord->loan_id }}
                        </div>
                        <div class="form-group">
                            <strong>Amount Payed:</strong>
                            {{ $loanPaymentRecord->amount_payed }}
                        </div>
                        <div class="form-group">
                            <strong>Outstanding Amount:</strong>
                            {{ $loanPaymentRecord->outstanding_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Is Partial:</strong>
                            {{ $loanPaymentRecord->is_partial }}
                        </div>
                        <div class="form-group">
                            <strong>Is Missed:</strong>
                            {{ $loanPaymentRecord->is_missed }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
