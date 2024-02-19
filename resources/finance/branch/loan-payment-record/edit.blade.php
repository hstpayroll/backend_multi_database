@extends('layouts_3.master.app')

@section('template_title')
    {{ __('Update') }} Loan Payment Record
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Loan Payment Record</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('loan-payment-records.update', $loanPaymentRecord->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('loan-payment-record.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
