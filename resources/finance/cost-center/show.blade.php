@extends('layouts_3.master.app')

@section('template_title')
    {{ $costCenter->name ?? "{{ __('Show') Cost Center" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cost Center</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cost-centers.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Code:</strong>
                            {{ $costCenter->code }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $costCenter->description }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $costCenter->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
