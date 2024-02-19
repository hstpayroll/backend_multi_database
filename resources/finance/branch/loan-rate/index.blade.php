@extends('layouts_3.master.app')

@section('template_title')
    Loan Rate
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Loan Rate') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('loan-rates.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Loan Id</th>
                                        <th>Rate</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loanRates as $loanRate)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $loanRate->loans }}</td>
                                            <td>{{ $loanRate->rate }}</td>

                                            <td>
                                                <form action="{{ route('loan-rates.destroy', $loanRate->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('loan-rates.show', $loanRate->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('loan-rates.edit', $loanRate->id) }}"><i
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
                {!! $loanRates->links() !!}
            </div>
        </div>
    </div>
@endsection
