@extends('layouts_3.master.app')

@section('template_title')
    {{ $exchangeRate->name ?? "{{ __('Show') Exchange Rate" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Exchange Rate</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('exchange-rates.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>From Currency Id:</strong>
                            {{ $exchangeRate->from_currency_id }}
                        </div>
                        <div class="form-group">
                            <strong>To Currency Id:</strong>
                            {{ $exchangeRate->to_currency_id }}
                        </div>
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            {{ $exchangeRate->start_date }}
                        </div>
                        <div class="form-group">
                            <strong>End Date:</strong>
                            {{ $exchangeRate->end_date }}
                        </div>
                        <div class="form-group">
                            <strong>Rate:</strong>
                            {{ $exchangeRate->rate }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $exchangeRate->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
