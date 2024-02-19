@extends('layouts_3.master.app')


@section('template_title')
    {{ $loanType->name ?? "{{ __('Show') Loan Type" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Loan Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('loan-types.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $loanType->name }}
                        </div>
                        <div class="form-group">
                            <strong>Company Id:</strong>
                            {{ $loanType->company_id }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $loanType->note }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
