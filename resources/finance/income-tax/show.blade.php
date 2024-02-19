@extends('layouts_3.master.app')

@section('template_title')
    {{ $incomeTax->name ?? "{{ __('Show') Income Tax" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Income Tax</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('income-taxes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Payroll Name Id:</strong>
                            {{ $incomeTax->payroll_name_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $incomeTax->name }}
                        </div>
                        <div class="form-group">
                            <strong>Min Income:</strong>
                            {{ $incomeTax->min_income }}
                        </div>
                        <div class="form-group">
                            <strong>Max Income:</strong>
                            {{ $incomeTax->max_income }}
                        </div>
                        <div class="form-group">
                            <strong>Tax Rate:</strong>
                            {{ $incomeTax->tax_rate }}
                        </div>
                        <div class="form-group">
                            <strong>Deduction:</strong>
                            {{ $incomeTax->deduction }}
                        </div>
                        <div class="form-group">
                            <strong>Details:</strong>
                            {{ $incomeTax->details }}
                        </div>
                        <div class="form-group">
                            <strong>Details2:</strong>
                            {{ $incomeTax->details2 }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $incomeTax->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
