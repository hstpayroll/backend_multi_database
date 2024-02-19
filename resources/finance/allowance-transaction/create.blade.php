@extends('layouts_3.master.app')

@section('template_title')
    {{ __('Create') }} Allowance Transaction
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Allowance Transaction</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('allowance-transactions.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('allowance-transaction.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
