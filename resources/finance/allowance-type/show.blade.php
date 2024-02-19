@extends('layouts_3.master.app')

@section('template_title')
    {{ $allowanceType->name ?? "{{ __('Show') Allowance Type" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Allowance Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('allowance-types.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Main Allowance Id:</strong>
                            {{ $allowanceType->main_allowance_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $allowanceType->name }}
                        </div>
                        <div class="form-group">
                            <strong>Taxability:</strong>
                            {{ $allowanceType->taxability }}
                        </div>
                        <div class="form-group">
                            <strong>Tax Free Amount:</strong>
                            {{ $allowanceType->tax_free_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Value Type:</strong>
                            {{ $allowanceType->value_type }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $allowanceType->status }}
                        </div>
                        <div class="form-group">
                            <strong>Company Id:</strong>
                            {{ $allowanceType->company_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
