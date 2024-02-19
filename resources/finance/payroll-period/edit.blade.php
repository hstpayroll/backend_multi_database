@extends('layouts_3.master.app')

@section('template_title')
    {{ __('Update') }} Payroll Period
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Payroll Period</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('payroll-periods.update', $payrollPeriod->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('payroll-period.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
