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
                        <i class="icon-bus"></i>
                        Buses
                    </h4>
                </div>
            </div>
            <div class="row">
                <ul class="nav responsive-tab nav-material nav-material-white">
                    <li>
                        <a class="nav-link active" href="/admin/buses"><i class="icon icon-list"></i>All
                            Buses</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/admin/buses/create"><i
                                    class="icon icon-plus-circle"></i> Add New Bus</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            @include('flash::message')
            <div class="row">
                <div class="col-md-12">
                    <div class="card no-b shadow">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover ">
                                    <tbody>
                                    <tr class="no-b" style="font-size:14px;">
                                        <td class="w-10">
                                            <strong>Bus Image</strong>
                                        </td>
                                        <td>
                                            <strong>Vehicle Description</strong>
                                        </td>
                                        <td><strong>License Plate Number</strong></td>
                                        <td><strong></strong>Primary Color</td>
                                        <td><strong>Secondary Color</strong></td>
                                        <td><strong>Status</strong></td>
                                        <td><strong>Routes</strong></td>
                                        <td><strong>Actions</strong></td>
                                    </tr>
                                    @foreach($buses as $bus)
                                        <tr class="no-b">
                                            <td class="w-10">
                                                <img src="/bus_images/{{$bus->image}}" alt="">
                                            </td>
                                            <td>
                                                <h6>{{$bus->make}} <i>{{$bus->model}}</i></h6>
                                                <small class="text-muted">{{$bus->company->company_name}}</small>
                                            </td>
                                            <td>{{$bus->license_plate_number}}</td>
                                            <td>{{$bus->primary_color}}</td>
                                            <td>{{$bus->secondary_color}}</td>
                                            <td>@if($bus->active == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Not active</span>
                                                @endif</td>
                                            <td>
                                                @if($bus->routes->count() < 1)
                                                    <a href="/admin/buses/{{$bus->id}}/route"><span
                                                                class="badge badge-warning">Add route</span></a>
                                                @else
                                                    @foreach($bus->routes as $route)
                                                        <span>{{$route->travel_from}} To {{$route->travel_to}}</span>
                                                        <br>
                                                    @endforeach
                                                @endif

                                            </td>
                                            <td>
                                                <a class="btn-fab btn-fab-sm btn-primary shadow text-white mr-3"
                                                   href="/admin/buses/{{$bus->id}}/edit"><i
                                                            class="icon-pencil"></i></a>
                                                <a class="btn-fab btn-fab-sm btn-danger shadow text-white"
                                                   href="/admin/buses/{{$bus->id}}/delete"><i
                                                            class="icon-delete"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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