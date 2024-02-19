@extends('layouts_3.master.app')

@section('content')
    <!-- Page Header-->

    <header class="bg-white shadow-sm px-4 py-3 z-index-20">
        <div class="container-fluid px-0">
            <h2 class="mb-0 p-1"> <span class="text-info">{{ $company->name }} </span> Dashboard</h2>
        </div>
    </header>
    <!-- Dashboard Counts Section-->
    <section class="pb-0">
        <div class="container-fluid">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row gx-5 bg-white">
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                            <div class="d-flex align-items-center">
                                <div class="icon flex-shrink-0 bg-violet">
                                    <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                        <use xlink:href="#user-1"> </use>
                                    </svg>
                                </div>
                                <div class="mx-3">
                                    <h6 class="h4 fw-light text-gray-600 mb-3">Total <br>Employees</h6>
                                    <div class="progress" style="height: 4px">
                                        <div class="progress-bar bg-violet" role="progressbar"
                                            style="width: 100%; height: 4px;" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="number"><strong class="text-lg">{{ $employees_count ?? 0 }}</strong>
                                </div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                            <div class="d-flex align-items-center">
                                <div class="icon flex-shrink-0 bg-red">
                                    <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                        <use xlink:href="#survey-1"> </use>
                                    </svg>
                                </div>
                                <div class="mx-3">
                                    <h6 class="h4 fw-light text-gray-600 mb-3">Work<br>Orders</h6>
                                    <div class="progress" style="height: 4px">
                                        <div class="progress-bar bg-red" role="progressbar" style="width: 70%; height: 4px;"
                                            aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="number"><strong class="text-lg">70</strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                            <div class="d-flex align-items-center">
                                <div class="icon flex-shrink-0 bg-green">
                                    <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                        <use xlink:href="#numbers-1"> </use>
                                    </svg>
                                </div>
                                <div class="mx-3">
                                    <h6 class="h4 fw-light text-gray-600 mb-3">New<br>Invoices</h6>
                                    <div class="progress" style="height: 4px">
                                        <div class="progress-bar bg-green" role="progressbar"
                                            style="width: 40%; height: 4px;" aria-valuenow="40" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="number"><strong class="text-lg">40</strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-6 py-4">
                            <div class="d-flex align-items-center">
                                <div class="icon flex-shrink-0 bg-orange">
                                    <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                        <use xlink:href="#list-details-1"> </use>
                                    </svg>
                                </div>
                                <div class="mx-3">
                                    <h6 class="h4 fw-light text-gray-600 mb-3">Open<br>Cases</h6>
                                    <div class="progress" style="height: 4px">
                                        <div class="progress-bar bg-orange" role="progressbar"
                                            style="width: 50%; height: 4px;" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="number"><strong class="text-lg">50</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('javascript')
    <script>
        var pusher = new Pusher('c700235002d5ef6dba35', {
            cluster: 'mt1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
@endsection
