@extends('layouts_3.master.app')

@section('template_title')
    Payroll Period
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Payroll Period') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('payroll-periods.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Income Tax Id</th>
                                        <th>Name</th>
                                        <th>Year</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payrollPeriods as $payrollPeriod)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $payrollPeriod->income_tax_id }}</td>
                                            <td>{{ $payrollPeriod->name }}</td>
                                            <td>{{ $payrollPeriod->year }}</td>
                                            <td>{{ $payrollPeriod->start_date }}</td>
                                            <td>{{ $payrollPeriod->end_date }}</td>
                                            <td>{{ $payrollPeriod->status }}</td>

                                            <td>
                                                <form action="{{ route('payroll-periods.destroy', $payrollPeriod->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('payroll-periods.show', $payrollPeriod->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('payroll-periods.edit', $payrollPeriod->id) }}"><i
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
                {!! $payrollPeriods->links() !!}
            </div>
        </div>
    </div>
@endsection
