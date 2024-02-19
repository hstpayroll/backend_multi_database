@extends( 'layouts.master.app' )
@section( 'title', 'TIMS | Driver Registration' )

@section( 'content' )

<x-breadcrumb department-link="maintenance" department-name="Admin" main-link="maintenance.downtime.index"
    main-name="Down Time" active-link="maintenance.downtime.index" active-name="Main" />
<div class="col-md-12">
    {{-- @include('master.error') --}}
    <div class="card text-left">
        <div class="card-header">
            <h2>Permission Update</h2>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="name"></label>
                <input type="text" name="name" id="name" class="form-control" value="{{$permission->name}}" readonly>
            </div>

            <div class='form-group'>
                <label for="permissions"> Select Permissions</label>
                {{-- {{ dd($permission->roles )}} --}}
                @foreach ($permission->roles as $pr)
                <div class="form-check ">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="permission[]" id="permissions" checked
                            disabled>
                        {{$pr->name}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="d-flex card-footer  d-flex align-items-center mt-4">

                <div class="form-group ms-auto">
                    <div class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="details">
                        <a href="{{route('permission.edit', $permission)}}" class="btn btn-primary"><i
                                class="fa fa-edit "></i></i>Edit</a>
                    </div>
                </div>

                <div class="ms-auto">
                    <form action=" {{route('permission.destroy',$permission) }}" method="post"
                        onsubmit="return confirm('Are you shure to delete this ? ')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger mr-4" type="submit">
                            <i class="fa fa-trash white"></i>
                            Delete </button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
