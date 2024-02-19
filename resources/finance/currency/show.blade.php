@extends('layouts_3.master.app')

@section('template_title')
    {{ $currency->name ?? "{{ __('Show') Currency" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Currency</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('currencies.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $currency->code }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $currency->name }}
                        </div>
                        <div class="form-group">
                            <strong>Is Default:</strong>
                            {{ $currency->is_default }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
