@extends('layouts.master.app')
@section('title', 'TIMS | Down Time')

@section('content')
    {{-- <x-breadcrumb department-link="maintenance" department-name="Admin" main-link="maintenance.downtime.index"
    main-name="Down Time" active-link="maintenance.downtime.index" active-name="Main" /> --}}

    <div class="col-md-12">
        <div class="card text-left col-md-12">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h2>All Down Time </h2>
                    @can('role create')
                        <div class="ms-auto">
                            <a href="{{ route('role.create') }}" class="btn btn-outline-primary"><i
                                    class="fa fa-plus fa-fw"></i>Create New Role</a>
                        </div>
                    @endcan
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive wrap-text">
                    <table class="table-sm table table-bordered table-striped " id="roles">
                        <thead>
                            <tr>
                                <th width="3%">Number</th>
                                <th>Role</th>
                                <th>Permissions</th>
                                @can('role view')
                                    <th class="text-center">Show</th>
                                @endcan
                            </tr>
                        </thead>

                        <tbody>
                            {{-- {{dd($role_has_permission)}} --}}
                            <?php $no = 0; ?>
                            @if ($roles->count() > 0)
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $role->name }}</td>
                                        {{-- <td>{{$role->permission()}}</td> --}}

                                        <td> {{ str_replace(['[', ']', '"'], ' ', $role->permissions()->pluck('name')) }}
                                        </td>
                                        @can('role view')
                                            <td class='m-1 p-1 text-center'><a href="{{ route('role.show', $role->id) }}">
                                                    <i class="fa fa-eye "></i> </a>
                                            </td>
                                        @endcan

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class='m-1 p-1 text-center' colspan="12">No Data Avilable</td>
                                </tr>
                            @endif

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
            $('#roles').DataTable();
        });
    </script>
@endsection
