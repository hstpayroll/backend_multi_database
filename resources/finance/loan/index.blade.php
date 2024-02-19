@extends('layouts_3.master.app')

@section('template_title')
    Loan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Loan') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('loans.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Employee Id</th>
                                        <th>Loan Type Id</th>
                                        <th>Amount</th>
                                        <th>Start Date</th>
                                        <th>Expected End Date</th>
                                        <th>Duration Months</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Termination Date</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loans as $loan)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $loan->employee->first_name }}</td>
                                            <td>{{ $loan->loanType->name }}</td>
                                            <td>{{ $loan->amount }}</td>
                                            <td>{{ $loan->start_date }}</td>
                                            <td>{{ $loan->expected_end_date }}</td>
                                            <td>{{ $loan->duration_months }}</td>
                                            <td>{{ $loan->description }}</td>
                                            <td>{{ $loan->status }}</td>
                                            <td>{{ $loan->termination_date }}</td>

                                            <td>
                                                <form action="{{ route('loans.destroy', $loan->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('loans.show', $loan->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('loans.edit', $loan->id) }}"><i
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
                {!! $loans->links() !!}
            </div>
        </div>
    </div>
@endsection
