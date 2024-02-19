@extends('layouts_3.master.app')

@section('template_title')
    {{ $mainAllowance->name ?? "{{ __('Show') Main Allowance" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Main Allowance</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('main-allowances.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $mainAllowance->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $mainAllowance->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
