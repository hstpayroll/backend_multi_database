@extends('layouts_3.master.app')

@section('template_title')
    {{ $companyPension->name ?? "{{ __('Show') Company Pension" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Company Pension</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('company-pensions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $companyPension->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $companyPension->description }}
                        </div>
                        <div class="form-group">
                            <strong>Rate:</strong>
                            {{ $companyPension->rate }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $companyPension->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
