@extends('layouts_3.master.app')

@section('template_title')
    Loan Payment Record
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Loan Payment Record') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('loan-payment-records.create') }}"
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

                                        <th>Employee name</th>
                                        <th>loan Amount</th>
                                        <th>loan Name</th>
                                        <th>Amount Payed</th>
                                        <th>Outstanding Amount</th>
                                        <th>Is Partial</th>
                                        <th>Is Missed</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loanPaymentRecords as $loanPaymentRecord)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $loanPaymentRecord->loan->employee->first_name }}</td>
                                            <td>{{ $loanPaymentRecord->loan->amount }}</td>
                                            <td>{{ $loanPaymentRecord->loan->loanType->name }}</td>
                                            {{-- <td>{{ $loanPaymentRecord->loan-> }}</td> --}}
                                            <td>{{ $loanPaymentRecord->amount_payed }}</td>
                                            <td>{{ $loanPaymentRecord->outstanding_amount }}</td>
                                            <td>{{ $loanPaymentRecord->is_partial }}</td>
                                            <td>{{ $loanPaymentRecord->is_missed }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('loan-payment-records.destroy', $loanPaymentRecord->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('loan-payment-records.show', $loanPaymentRecord->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('loan-payment-records.edit', $loanPaymentRecord->id) }}"><i
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
                {!! $loanPaymentRecords->links() !!}
            </div>
        </div>
    </div>
@endsection
