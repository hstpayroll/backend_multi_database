@extends('layouts_3.master.app')
@section('template_title')
    {{ __('Create') }} Loan Rate
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Loan Rate</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('loan-rates.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('loan-rate.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
