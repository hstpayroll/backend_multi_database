@extends('layouts.master.app')
@section('title', 'TIMS | Down Time Registration')

@section('content')

    {{-- <x-breadcrumb department-link="maintenance" department-name="Admin" main-link="maintenance.downtime.index"
    main-name="Down Time" active-link="maintenance.downtime.index" active-name="Main" /> --}}

    <div class="col-md-12">

        <div class="card text-left">
            <div class="card-header">

                <div class="d-flex align-items-center">
                    <h2>Role Registration</h2>
                    {{--
                <!-- @can('driver create') --> --}}
                    <div class="ms-auto">
                        <a href="{{ route('role.index') }}" class="btn btn-outline-primary">
                            <i class="fa fa-backward fa-fw" aria-hidden="true"></i>Back</a>
                    </div>
                    {{--
                <!-- @endcan --> --}}
                </div>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('role.store') }}">
                    @csrf
                    <div class="form-group required">
                        <label for="name">Role Name</label>
                        <input name="name" type="text" class="form-control" id=" name" value="{{ $role->name }}"
                            disabled>
                    </div>

                    <div class='form-group'>
                        @foreach ($role->permissions as $key => $permission)
                            <ul class="list-group">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center m-1 p-1 text-capitalize">
                                    {{ $permission->name }}
                                    <span class="badge badge-primary badge-pill">{{ $key + 1 }}</span>
                                </li>
                            </ul>
                        @endforeach
                    </div>
            </div>

            <div class="card-footer">
                <div class="d-flex align-items-center mt-4">
                    <div class="form-group ">
                        <a href="{{ route('role.edit', $role) }}" class="btn btn-primary"><i
                                class="fa fa-floppy-o mr-2"></i>Edit </a>
                    </div>

                    <div class="form-group ms-auto">
                        <form method="POST" action="{{ route('role.destroy', $role) }}"
                            onsubmit="return confirm('Are you shure to delete this ? ')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-trash white"></i>
                                Delete </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
