@extends('layouts_3.master.app')

@section('template_title')
    {{ __('Create') }} Citizenship
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Citizenship</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('citizenships.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('citizenship.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
