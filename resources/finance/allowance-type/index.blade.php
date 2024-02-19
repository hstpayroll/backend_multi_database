@extends('layouts_3.master.app')

@section('template_title')
    Allowance Type
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Allowance Type') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('allowance-types.create') }}" class="btn btn-primary btn-sm float-right"
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

                                        <th>Main Allowance Id</th>
                                        <th>Name</th>
                                        <th>Taxability</th>
                                        <th>Tax Free Amount</th>
                                        <th>Value Type</th>
                                        <th>Status</th>
                                        <th>Company Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allowanceTypes as $allowanceType)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $allowanceType->mainAllowance->name }}</td>
                                            <td>{{ $allowanceType->name }}</td>
                                            <td>{{ $allowanceType->taxability }}</td>
                                            <td>{{ $allowanceType->tax_free_amount }}</td>
                                            <td>{{ $allowanceType->value_type }}</td>
                                            <td>{{ $allowanceType->status }}</td>
                                            <td>{{ $allowanceType->company_id }}</td>

                                            <td>
                                                <form action="{{ route('allowance-types.destroy', $allowanceType->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('allowance-types.show', $allowanceType->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('allowance-types.edit', $allowanceType->id) }}"><i
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
                {!! $allowanceTypes->links() !!}
            </div>
        </div>
    </div>
@endsection
