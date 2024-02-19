@extends('layouts_3.master.app')

@section('template_title')
    Allowance Transaction
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Allowance Transaction') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('allowance-transactions.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
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

                                        <th>Payroll Date</th>
                                        <th>Employee Id</th>
                                        <th>Allowance Type Id</th>
                                        <th>Amount</th>
                                        <th>Taxable Amount</th>
                                        <th>Non Taxable Amount</th>
                                        <th>Is Day Based</th>
                                        <th>Start Date</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allowanceTransactions as $allowanceTransaction)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $allowanceTransaction->payroll_date }}</td>
                                            <td>{{ $allowanceTransaction->employee_id }}</td>
                                            <td>{{ $allowanceTransaction->allowance_type_id }}</td>
                                            <td>{{ $allowanceTransaction->amount }}</td>
                                            <td>{{ $allowanceTransaction->taxable_amount }}</td>
                                            <td>{{ $allowanceTransaction->non_taxable_amount }}</td>
                                            <td>{{ $allowanceTransaction->is_day_based }}</td>
                                            <td>{{ $allowanceTransaction->start_date }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('allowance-transactions.destroy', $allowanceTransaction->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('allowance-transactions.show', $allowanceTransaction->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('allowance-transactions.edit', $allowanceTransaction->id) }}"><i
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
                {!! $allowanceTransactions->links() !!}
            </div>
        </div>
    </div>
@endsection
