@extends('layouts_3.master.app')

@section('template_title')
    {{ __('Create') }} Tax Region
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Tax Region</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tax-regions.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('tax-region.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
