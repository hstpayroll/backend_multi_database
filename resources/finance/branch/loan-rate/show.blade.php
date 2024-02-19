@extends('layouts_3.master.app')

@section('template_title')
    {{ $loanRate->name ?? "{{ __('Show') Loan Rate" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Loan Rate</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('loan-rates.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Loan Id:</strong>
                            {{ $loanRate->loan_id }}
                        </div>
                        <div class="form-group">
                            <strong>Rate:</strong>
                            {{ $loanRate->rate }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
