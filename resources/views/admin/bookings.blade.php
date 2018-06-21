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
                        Bookings
                    </h4>
                </div>
            </div>

            <div class="row">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-payments"
                           role="tab" aria-controls="v-pills-payments"><i class="icon icon-money-1"></i>All Bookings</a>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card no-b">
                                <div class="card-header white b-0 p-3">
                                    <h4 class="card-title">All Bookings</h4>
                                    <small class="card-subtitle mb-2 text-muted">Bookings made by users.</small>
                                </div>
                                <div class="collapse show" id="invoiceCard">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table id="recent-orders"
                                                   class="table table-hover mb-0 ps-container ps-theme-default">
                                                <thead class="bg-light">
                                                <tr>
                                                    <th>BID</th>
                                                    <th>Route</th>
                                                    <th>Company</th>
                                                    <th>User Name</th>
                                                    <th>Status</th>
                                                    <th>Seat(s)</th>
                                                    <th>Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($bookings as $booking)
                                                        <tr>
                                                            <td>PAP-10521</td>
                                                            <td><a href="#">{{$booking->route->travel_from}} To {{$booking->route->travel_to}}</a></td>
                                                            <td><a href="#">{{$booking->route->bus->agent->company}}</a></td>
                                                            <td>{{$booking->user->first_name}} {{$booking->user->last_name}}</td>
                                                            <td><span class="badge badge-success">Paid</span></td>
                                                            <td>{{$booking->number_of_seats}}</td>
                                                            <td>SHS {{$booking->route->unit_seat_price * $booking->number_of_seats}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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