@extends('layouts_3.master.app')

@section('template_title')
    {{ $bank->name ?? "{{ __('Show') Bank" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Bank</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('banks.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $bank->name }}
                        </div>
                        <div class="form-group">
                            <strong>Swift:</strong>
                            {{ $bank->swift }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
