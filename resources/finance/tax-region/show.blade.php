@extends('layouts_3.master.app')

@section('template_title')
    {{ $taxRegion->name ?? "{{ __('Show') Tax Region" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tax Region</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tax-regions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $taxRegion->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
