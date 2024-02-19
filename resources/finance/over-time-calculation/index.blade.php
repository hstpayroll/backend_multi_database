@extends('layouts_3.master.app')

@section('template_title')
    Over Time Calculation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Over Time Calculation') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('over-time-calculations.create') }}"
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

                                        <th>Company Id</th>
                                        <th>Employee Id</th>
                                        <th>Over Time Type Id</th>
                                        <th>Ot Date</th>
                                        <th>Ot Hour</th>
                                        <th>Ot Value</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($overTimeCalculations as $overTimeCalculation)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $overTimeCalculation->company->name }}</td>
                                            <td>{{ $overTimeCalculation->employee->first_name }}</td>
                                            <td>{{ $overTimeCalculation->overTimeType->name }}</td>
                                            <td>{{ $overTimeCalculation->ot_date }}</td>
                                            <td>{{ $overTimeCalculation->ot_hour }}</td>
                                            <td>{{ $overTimeCalculation->ot_value }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('over-time-calculations.destroy', $overTimeCalculation->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('over-time-calculations.show', $overTimeCalculation->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('over-time-calculations.edit', $overTimeCalculation->id) }}"><i
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
                {!! $overTimeCalculations->links() !!}
            </div>
        </div>
    </div>
@endsection
