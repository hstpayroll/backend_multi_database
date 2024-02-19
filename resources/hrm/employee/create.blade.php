@extends('layouts_3.master.app')

@section('template_title')
    {{ __('Create') }} Employee
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Employee</span>
                    </div>
                    <div class="card-body">
                        @include('layouts_2.master.error')
                        <form method="POST" action="{{ route('employees.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('employee.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
