@extends('layouts_3.master.app')

@section('template_title')
    {{ $overTimeType->name ?? "{{ __('Show') Over Time Type" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Over Time Type</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('over-time-types.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $overTimeType->name }}
                        </div>
                        <div class="form-group">
                            <strong>Rate:</strong>
                            {{ $overTimeType->rate }}
                        </div>
                        <div class="form-group">
                            <strong>Company Id:</strong>
                            {{ $overTimeType->company_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
