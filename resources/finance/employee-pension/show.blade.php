@extends('layouts_3.master.app')

@section('template_title')
    {{ $employeePension->name ?? "{{ __('Show') Employee Pension" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Employee Pension</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('employee-pensions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $employeePension->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $employeePension->description }}
                        </div>
                        <div class="form-group">
                            <strong>Rate:</strong>
                            {{ $employeePension->rate }}
                        </div>
                        <div class="form-group">
                            <strong>Start Date:</strong>
                            {{ $employeePension->start_date }}
                        </div>
                        <div class="form-group">
                            <strong>End Date:</strong>
                            {{ $employeePension->end_date }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $employeePension->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
