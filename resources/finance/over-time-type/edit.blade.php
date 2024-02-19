@extends('layouts_3.master.app')

@section('template_title')
    {{ __('Update') }} Over Time Type
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Over Time Type</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('over-time-types.update', $overTimeType->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('over-time-type.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
