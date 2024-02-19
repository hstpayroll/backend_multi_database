@extends('layouts_3.master.app')

@section('template_title')
    {{ $position->name ?? "{{ __('Show') Position" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Position</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('positions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $position->name }}
                        </div>
                        <div class="form-group">
                            <strong>Sub Department Id:</strong>
                            {{ $position->sub_department_id }}
                        </div>
                        <div class="form-group">
                            <strong>Company Id:</strong>
                            {{ $position->company_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
