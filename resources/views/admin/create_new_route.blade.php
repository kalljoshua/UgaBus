@extends('...layouts.admin_layout')
@section('title')
    <title>Agents</title>
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
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link" href="/admin/routes"><i class="icon icon-home2"></i>All Routes</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="/admin/routes/create"><i class="icon icon-plus-circle"></i> Add
                            New Route</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form method="post" action="/admin/routes/save">
                        {{ csrf_field() }}
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <h5 class="card-title">About Route</h5>
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="bus" class="col-form-label s-12">BUS</label>
                                            @if($selected_bus == true)
                                                <input id="bus" name="bus"
                                                       value="{{$bus->id}}"
                                                       placeholder="Enter Driver Full Name"
                                                       class="form-control r-0 light s-12 " type="hidden">
                                                <input id="bus" name="bus"
                                                       value="{{$bus->company->company_name}} :: {{$bus->license_plate_number}}"
                                                       class="form-control r-0 light s-12 " type="text" disabled="">
                                            @else
                                            <!--<input type="text" class="form-control"  placeholder="Mobile Phones" required>-->
                                                <select id="bus" name="bus" class="custom-select form-control"
                                                        required>
                                                    <option value="">Select Bus</option>
                                                    @foreach($buses as $bus)
                                                        <option value="{{$bus->id}}">{{$bus->company->company_name}}
                                                            :: {{$bus->license_plate_number}}</option>
                                                    @endforeach
                                                </select>
                                            @endif

                                        </div>
                                        <div class="form-group m-0">
                                            <label for="driver_name" class="col-form-label s-12">BUS DRIVER NAME</label>
                                            <input id="driver_name" name="driver_name"
                                                   placeholder="Enter Driver Full Name"
                                                   class="form-control r-0 light s-12 " type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h5 class="card-title">ROUTE</h5>
                                <div class="form-row">
                                    <div class="form-group col-6 m-0">
                                        <label for="start_point" class="col-form-label s-12">START POINT</label>
                                        <input id="start_point" name="start_point" placeholder="Enter User Name"
                                               class="form-control r-0 light s-12 date-picker" type="text">
                                    </div>
                                    <div class="form-group col-6 m-0">
                                        <label for="end_point" class="col-form-label s-12">END POINT</label>
                                        <input id="end_point" name="end_point" placeholder="Select Date of Birth"
                                               class="form-control r-0 light s-12" type="text">
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <label for="days" class="col-form-label s-12">TRAVEL DAYS</label>
                                    <br>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" id="checkedAll"
                                                           class="custom-control-input"><label
                                                            class="custom-control-label" for="checkedAll">All
                                                        days</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkSingle"
                                                           id="user_id_1" name="monday"><label
                                                            class="custom-control-label"
                                                            for="user_id_1">Monday</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkSingle"
                                                           id="user_id_5" name="friday"><label
                                                            class="custom-control-label"
                                                            for="user_id_5">Friday</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkSingle"
                                                           id="user_id_2" name="tuesday"><label
                                                            class="custom-control-label"
                                                            for="user_id_2">Tuesday</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkSingle"
                                                           id="user_id_6" name="saturday"><label
                                                            class="custom-control-label"
                                                            for="user_id_6">Saturday</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkSingle"
                                                           id="user_id_3" name="wednesday"><label
                                                            class="custom-control-label"
                                                            for="user_id_3">Wednesday</label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkSingle"
                                                           id="user_id_7" name="sunday"><label
                                                            class="custom-control-label"
                                                            for="user_id_7">Sunday</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkSingle"
                                                           id="user_id_4" name="thursday"><label
                                                            class="custom-control-label"
                                                            for="user_id_4">Thursday</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-5 m-0">
                                        <label for="travel_period" class="col-form-label s-12">TRAVEL PERIOD</label>
                                        <select id="travel_period" name="travel_period"
                                                class="custom-select form-control"
                                                required>
                                            <option value="">Select Travel Period</option>
                                            <option value="0">Hours</option>
                                            <option value="1">1 Day</option>
                                            <option value="2">2 Days</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-6 m-0">
                                        <label for="departure_time" class="col-form-label s-12">DEPARTURE TIME</label>
                                        <input type="time" name="departure_time" class="form-control r-0 light s-12"
                                               id="departure_time"
                                               placeholder="Enter Departure time">
                                    </div>

                                    <div class="form-group col-6 m-0">
                                        <label for="arrival_time" class="col-form-label s-12">ARRIVAL TIME</label>
                                        <input type="time" name="arrival_time" class="form-control r-0 light s-12"
                                               id="arrival_time"
                                               placeholder="Enter Arrival time">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h5 class="card-title">TRAVEL FAIR</h5>
                                <div class="form-row">
                                    <div class="form-group col-9 m-0">
                                        <label for="seat_price" class="col-form-label s-12">SEAT PRICE</label>
                                        <input id="seat_price" name="seat_price" placeholder="Enter Seat Price"
                                               class="form-control r-0 light s-12 date-picker" type="text">
                                    </div>
                                    <div class="form-group col-3 m-0">
                                        <label for="currency" class="col-form-label s-12">CURRENCY</label>
                                        <select id="currency" name="currency" class="custom-select form-control"
                                                required>
                                            <option value="">Select Currency</option>
                                            <option value="ugx">UGX</option>
                                            <option value="ksh">KSH</option>
                                            <option value="tsh">TSH</option>
                                            <option value="sd">SD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save
                                    Data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection