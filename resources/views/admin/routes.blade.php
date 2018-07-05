@extends('...layouts.admin_layout')
@section('title')
    <title>Buses</title>
@endsection
@section('content')
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-database"></i>
                        Routes
                    </h4>
                </div>
            </div>

            <div class="row">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-payments"
                           role="tab" aria-controls="v-pills-payments"><i class="icon icon-money-1"></i>All Routes</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/admin/routes/create"><i class="icon icon-plus-circle"></i> Add
                            New Route</a>
                    </li>
                </ul>
            </div>

        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-payments" role="tabpanel"
                     aria-labelledby="v-pills-payments-tab">
                    @include('flash::message')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card no-b">
                                <div class="collapse show" id="invoiceCard">
                                    <div class="card-body p-0">
                                        @if($routes->count() < 1)
                                            <h3 style="padding: 10px;padding-top: 20px;">No Routes in the system</h3>
                                        @else
                                            <div class="table-responsive">
                                                <table id="recent-orders"
                                                       class="table table-hover mb-0 ps-container ps-theme-default">
                                                    <thead class="bg-light">
                                                    <tr>
                                                        <th>RID</th>
                                                        <th>Start Point</th>
                                                        <th>Stop point</th>
                                                        <th>Travel Period (DAYS)</th>
                                                        <th>Departure Time</th>
                                                        <th>Arrival Time</th>
                                                        <th>Seat Price</th>
                                                        <th>Bus Company</th>
                                                        <th>Vehicle</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($routes as $route)
                                                        <tr>
                                                            <td>ROUTE-100{{$route->id}}</td>
                                                            <td>{{$route->travel_from}}</td>
                                                            <td>{{$route->travel_to}}</td>
                                                            <td>{{$route->travel_period}}</td>
                                                            <td>{{$route->time_of_departure}}</td>
                                                            <td>{{$route->estimated_time_of_arrival}}</td>
                                                            <td>{{$route->unit_seat_price}}</td>
                                                            <td>{{$route->bus->company->company_name}}</td>
                                                            <td>{{$route->bus->make}} {{$route->bus->model}}</td>
                                                            <td>
                                                                <a class="btn-fab btn-fab-sm btn-primary shadow text-white mr-3"
                                                                   href="/admin/routes/{{$route->id}}/edit"><i
                                                                            class="icon-pencil"></i></a>
                                                                <a class="btn-fab btn-fab-sm btn-danger shadow text-white"
                                                                   href="/admin/routes/{{$route->id}}/delete"><i
                                                                            class="icon-delete"></i></a></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{--<nav class="pt-3" aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>--}}
        </div>
    </div>


@endsection