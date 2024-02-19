@extends('layouts_3.master.app')

@section('template_title')
    Employee Pension
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Employee Pension') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('employee-pensions.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Rate</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employeePensions as $employeePension)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $employeePension->name }}</td>
                                            <td>{{ $employeePension->description }}</td>
                                            <td>{{ $employeePension->rate }}</td>
                                            <td>{{ $employeePension->start_date }}</td>
                                            <td>{{ $employeePension->end_date }}</td>
                                            <td>{{ $employeePension->status }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('employee-pensions.destroy', $employeePension->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('employee-pensions.show', $employeePension->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('employee-pensions.edit', $employeePension->id) }}"><i
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
                {!! $employeePensions->links() !!}
            </div>
        </div>
    </div>
@endsection
