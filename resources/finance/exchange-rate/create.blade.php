@extends('layouts_3.master.app')

@section('template_title')
    {{ __('Create') }} Exchange Rate
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Exchange Rate</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('exchange-rates.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('exchange-rate.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
