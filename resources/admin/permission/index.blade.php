@extends('layouts.master.app')
@section('title', 'TIMS | Permission All')
@section('content')

@section('content')

    {{-- <x-breadcrumb department-link="operation" department-name="Admin" main-link="operation.downtime.index"
        main-name="Down Time" active-link="operation.downtime.index" active-name="Main" /> --}}

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class=" d-flex align-items-center">
                    <h2>All Down Time </h2>
                    <div class="ms-auto">
                        <a href="{{ route('permission.create') }}" class="btn btn-outline-primary"><i
                                class="fa fa-plus fa-fw"></i>Add New Permission</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="permissions">
                        <thead>
                            <tr>
                                <th>Permissions</th>
                                <th>Show</th>
                                {{-- <th>Delete</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>

                                    <td> {{ $permission->name }}</td>
                                    <td class='m-1 p-1 text-center'><a href="{{ route('permission.show', $permission) }}">
                                            <i class="fa fa-eye "></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script>
        $(document).ready(function() {
            $('#permissions').DataTable();
        });
    </script>
@endsection
