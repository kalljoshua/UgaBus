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
                        <i class="icon-package"></i>
                        Buses
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white">
                    <li>
                        <a class="nav-link" href="/admin/buses"><i class="icon icon-list"></i>All
                            Buses</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="/admin/buses/create"><i
                                    class="icon icon-plus-circle"></i> Add New Bus</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <form method="post" action="/admin/buses/save" id="needs-validation" novalidate>
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="card mt-4">
                            <h6 class="card-header white">Bus Details</h6>
                            <div class="card-body text-success">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Make</label>
                                        <input type="text" name="make" class="form-control" id="validationCustom01"
                                               placeholder="Enter make" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Model</label>
                                        <input type="text" name="model" class="form-control" id="validationCustom02"
                                               placeholder="Enter model" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category">License Plate Number</label>
                                        <input type="text" name="license_plate_number" class="form-control"
                                               id="validationCustom04"
                                               placeholder="Enter license plate number"
                                               required>
                                        <div class="invalid-feedback">
                                            Please provide a valid category.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom04">Primary Color</label>
                                        <input type="text" name="primary_color" class="form-control"
                                               id="validationCustom04"
                                               placeholder="Enter primary color"
                                               required>
                                        <div class="invalid-feedback">
                                            Please provide a valid price.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="sku">Secondary Color</label>
                                        <input type="text" name="secondary_color" class="form-control" id="sku"
                                               placeholder="Enter secondary color"
                                               required>
                                        <div class="invalid-feedback">
                                            Please provide a valid sku.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <h6 class="card-header white">Agent</h6>
                            <div class="card-body text-success">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category">Agent Name</label>
                                        <!--<input type="text" class="form-control"  placeholder="Mobile Phones" required>-->
                                        <select id="category" name="agent_id" class="custom-select form-control"
                                                required>
                                            <option value="">Select Agent</option>
                                            @foreach($agents as $agent)
                                                <option value="{{$agent->id}}">{{$agent->first_name}} {{$agent->last_name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid category.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Company</label>
                                        <input type="text" name="company" class="form-control" id="validationCustom02"
                                               placeholder="Company Name" required disabled="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category">Bus Park</label>
                                        <select id="category" name="park_id" class="custom-select form-control"
                                                required>
                                            <option value="">Select Bus Park</option>
                                            @foreach($parks as $park)
                                                <option value="{{$park->id}}">{{$park->park_name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid category.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <h6 class="card-header white">Bus Routes</h6>
                            <div class="card-body text-success">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Travel From</label>
                                        <input type="text" name="travel_from" class="form-control"
                                               id="validationCustom01"
                                               placeholder="Enter departure location" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Travel To</label>
                                        <input type="text" name="travel_to" class="form-control" id="validationCustom02"
                                               placeholder="Enter destination location" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category">Seat Price(SHS)</label>
                                        <input type="text" name="seat_price" class="form-control"
                                               id="validationCustom01"
                                               placeholder="Product Name" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid category.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationCustom04">Departure Time</label>
                                        <input type="time" name="dep_time" class="form-control" id="validationCustom04"
                                               placeholder="00:00 AM"
                                               required>
                                        <div class="invalid-feedback">
                                            Please provide a valid price.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="sku">Estimated Arrival Time</label>
                                        <input type="time" name="arr_time" class="form-control" id="sku"
                                               placeholder="00:00 PM"
                                               required>
                                        <div class="invalid-feedback">
                                            Please provide a valid sku.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mt-4">
                            <h6 class="card-header white">Publish Box</h6>
                            <div class="card-body text-success">

                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" name="publish" value="publish" class="custom-control-input"
                                           id="customControlValidation1"
                                           required>
                                    <label class="custom-control-label" for="customControlValidation1">Check to
                                        publish</label>
                                    <div class="invalid-feedback">Example invalid feedback text</div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <button class="btn btn-primary" type="submit">Publish</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection