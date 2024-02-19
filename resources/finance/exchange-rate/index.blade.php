@extends('layouts_3.master.app')

@section('template_title')
    Exchange Rate
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Exchange Rate') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('exchange-rates.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>From Currency Id</th>
                                        <th>To Currency Id</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Rate</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exchangeRates as $exchangeRate)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $exchangeRate->from_currency_id }}</td>
                                            <td>{{ $exchangeRate->to_currency_id }}</td>
                                            <td>{{ $exchangeRate->start_date }}</td>
                                            <td>{{ $exchangeRate->end_date }}</td>
                                            <td>{{ $exchangeRate->rate }}</td>
                                            <td>{{ $exchangeRate->status }}</td>

                                            <td>
                                                <form action="{{ route('exchange-rates.destroy', $exchangeRate->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('exchange-rates.show', $exchangeRate->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('exchange-rates.edit', $exchangeRate->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $exchangeRates->links() !!}
            </div>
        </div>
    </div>
@endsection
