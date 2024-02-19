@extends('layouts_3.master.app')

@section('template_title')
    Income Tax
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Income Tax') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('income-taxes.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Payroll Name Id</th>
                                        <th>Name</th>
                                        <th>Min Income</th>
                                        <th>Max Income</th>
                                        <th>Tax Rate</th>
                                        <th>Deduction</th>
                                        <th>Details</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incomeTaxes as $incomeTax)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $incomeTax->payrollName->name }}</td>
                                            <td>{{ $incomeTax->name }}</td>
                                            <td>{{ $incomeTax->min_income }}</td>
                                            <td>{{ $incomeTax->max_income }}</td>
                                            <td>{{ $incomeTax->tax_rate }}</td>
                                            <td>{{ $incomeTax->deduction }}</td>
                                            <td>{{ $incomeTax->details }}</td>
                                            <td>{{ $incomeTax->status }}</td>

                                            <td>
                                                <form action="{{ route('income-taxes.destroy', $incomeTax->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('income-taxes.show', $incomeTax->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('income-taxes.edit', $incomeTax->id) }}"><i
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
                {!! $incomeTaxes->links() !!}
            </div>
        </div>
    </div>
@endsection
