@extends('layouts.master.app')
@section('title', 'TIMS | Driver Registration')
@section('content')

    <x-breadcrumb department-link="maintenance" department-name="Admin" main-link="maintenance.downtime.index"
        main-name="Down Time" active-link="maintenance.downtime.index" active-name="Main" />

    <div class="col-md-12">
        <div class="card text-left">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h2>Permission Registration</h2>
                    {{-- @can('customer create') --}}

                    <div class="ms-auto">
                        <a href="{{ route('permission.index') }}" class="btn btn-outline-primary"><i
                                class="fa fa-back mr-1"></i>Back</a>

                    </div>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('permission.store') }}" id="driver_reg" novalidate>
                    @csrf

                    <div class="form-group required mb-4">
                        <label for="name">Permission</label>
                        <input type="text" name="name" id="name"
                            class="form-control  input-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"
                            placeholder="Permmsion Name" aria-describedby="helpId">

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <h4 class="m-2">Assign Permission to Roles</h4>

                    @foreach ($roles as $role)
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="roles[]" id=""
                                    value="{{ $role->id }}">
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
            </div>

            <div class="card-footer">
                <div class="form-group required">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection
