@extends('layouts_3.master.app')

@section('template_title')
    {{ $overTimeCalculation->name ?? "{{ __('Show') Over Time Calculation" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Over Time Calculation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('over-time-calculations.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Company Id:</strong>
                            {{ $overTimeCalculation->company_id }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $overTimeCalculation->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>Over Time Type Id:</strong>
                            {{ $overTimeCalculation->over_time_type_id }}
                        </div>
                        <div class="form-group">
                            <strong>Ot Date:</strong>
                            {{ $overTimeCalculation->ot_date }}
                        </div>
                        <div class="form-group">
                            <strong>Ot Hour:</strong>
                            {{ $overTimeCalculation->ot_hour }}
                        </div>
                        <div class="form-group">
                            <strong>Ot Value:</strong>
                            {{ $overTimeCalculation->ot_value }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
