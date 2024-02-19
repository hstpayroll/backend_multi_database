@include('layouts_3.master.head')

@include('layouts_3.master.topnav')
<!-- Side Navbar -->
{{-- @include('layouts_3.master.sidenav') --}}
<div class="content-inner w-100">
    <div class="col-md-12 mt-2">
        <div class="card text-left col-md-12">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4>All Companies</h4>
                    {{-- @can('currency create') --}}

                    {{-- @endcan --}}
                </div>
            </div>

            <div class="card-body">
                <div class="">
                    Welcome Mr/Mis : {{ auth()->user()->name }} You have assigned to {{ $companies->count() }} companies
                </div>
                <ul>
                    @foreach ($companies as $company)
                        <form action="{{ route('company.dashboard', $company) }}" method="POST">
                            @csrf
                            <input type="hidden" name="company_id" value="{{ $company->id }}">
                            <button type="submit" value="{{ $company->id }}">{{ $company->name }}</button>
                        </form>
                    @endforeach
                </ul>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>

    @include('layouts_3.master.footer')
