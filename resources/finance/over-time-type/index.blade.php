@extends('layouts_3.master.app')

@section('template_title')
    Over Time Type
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Over Time Type') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('over-time-types.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Rate</th>
                                        <th>Company Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($overTimeTypes as $overTimeType)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $overTimeType->name }}</td>
                                            <td>{{ $overTimeType->rate }}</td>
                                            <td>{{ $overTimeType->company->name }}</td>

                                            <td>
                                                <form action="{{ route('over-time-types.destroy', $overTimeType->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('over-time-types.show', $overTimeType->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('over-time-types.edit', $overTimeType->id) }}"><i
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
                {!! $overTimeTypes->links() !!}
            </div>
        </div>
    </div>
@endsection
