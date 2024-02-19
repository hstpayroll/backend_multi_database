@extends('layouts_3.master.app')
@section('template_title')
    {{ __('Create') }} Employment Type
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Employment Type</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employment-types.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('employment-type.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
