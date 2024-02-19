@extends('layouts.master.app')
@section('title', 'TIMS | Down Time')

@section('content')

    <x-breadcrumb department-link="maintenance" department-name="Admin" main-link="maintenance.downtime.index"
        main-name="Down Time" active-link="maintenance.downtime.index" active-name="Main" />

    <div class="col-md-12">
        <div class="card text-left col-md-12">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h2>All Down Time </h2>
                    {{-- @can('customer create') --}}

                    <div class="ms-auto">
                        <a href="{{ route('permission.index') }}" class="btn btn-outline-primary"><i
                                class="fa fa-back mr-1"></i>Back</a>

                    </div>
                    {{-- @endcan --}}
                </div>
            </div>

            <div class="card-body">

                <form method="post" action="{{ route('permission.update', $permission) }}" id="driver_reg" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $permission->name }}" aria-describedby="helpId">
                    </div>


                    <div class='form-group'>

                        <label for="roles"> Select Permissions</label>
                        @foreach ($roles as $role)
                            <div class="form-check ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="role[]" id="roles"
                                        value="{{ $role->id }}"
                                        @foreach ($permission->roles as $r)
                            @if ($role->id == $r->id)
                            checked @endif @endforeach>
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
            </div>
            <div class="card-footer  d-flex align-items-center mt-4">
                <div class="">
                </div>

                <div class="form-group ms-auto">
                    <div class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="details">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit "></i>
                            Save Updates
                        </button>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            </form>

        </div>
    </div>


@endsection
