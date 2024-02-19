@extends('layouts_3.master.app')

@section('template_title')
    {{ $grade->name ?? "{{ __('Show') Grade" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Grade</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('grades.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $grade->name }}
                        </div>
                        <div class="form-group">
                            <strong>Company Id:</strong>
                            {{ $grade->company_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
