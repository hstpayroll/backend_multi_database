@extends('layouts_3.master.app')

@section('template_title')
    {{ $payrollType->name ?? "{{ __('Show') Payroll Type" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Payroll Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('payroll-types.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $payrollType->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
