@extends('layouts.master.app')
@section('title', 'TIMS | Down Time Registration')

@section('content')

    {{-- <x-breadcrumb department-link="maintenance" department-name="Admin" main-link="maintenance.downtime.index"
    main-name="Down Time" active-link="maintenance.downtime.index" active-name="Main" /> --}}

    <div class="col-md-12">
        <div class="card text-left">
            <div class="card-header">

                <div class="d-flex align-items-center">
                    <h2>Down Time Registration</h2>
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
                        <input name="name" type="text"
                            class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                            value="{{ old('name') }}" onfocusout="validateName()">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        <span class="invalid-feedback" role="alert"></span>
                    </div>

                    <div class='form-group'>
                        <label for="permissions"> Select Permissions</label>
                        @foreach ($permissions as $permission)
                            <div class="form-check ">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" id="permissions"
                                        value="{{ $permission->id }}"> {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="card-footer">
                        <div class="form-group required pull-right">
                            <button type="submit" class="btn btn-lg btn-primary" name="save">Save</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

@endsection
