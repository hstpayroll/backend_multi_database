@extends('layouts_3.master.app')

@section('template_title')
    Salary Management
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Salary Management') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('salary-managements.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Reason</th>
                                        <th>Old Salary</th>
                                        <th>New Salary</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Description</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salaryManagements as $salaryManagement)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $salaryManagement->employee->first_name }}</td>
                                            <td>{{ $salaryManagement->reason }}</td>
                                            <td>{{ $salaryManagement->old_salary }}</td>
                                            <td>{{ $salaryManagement->new_salary }}</td>
                                            <td>{{ $salaryManagement->start_date }}</td>
                                            <td>{{ $salaryManagement->end_date }}</td>
                                            <td>{{ $salaryManagement->description }}</td>
                                            <td>{{ $salaryManagement->status }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('salary-managements.destroy', $salaryManagement->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('salary-managements.show', $salaryManagement->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('salary-managements.edit', $salaryManagement->id) }}"><i
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
                {!! $salaryManagements->links() !!}
            </div>
        </div>
    </div>
@endsection
