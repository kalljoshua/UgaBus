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
            <form method="post" action="/admin/buses/update" id="needs-validation" novalidate enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="card mt-4">
                            <h6 class="card-header white">Company & Agent</h6>
                            <div class="card-body text-success">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category">Bus Park</label>
                                        <select id="category" name="company_id" class="custom-select form-control"
                                                required>
                                            <option value="">Select Bus Park</option>
                                            <option value="{{$bus->company->id}}"
                                                    selected>{{$bus->company->company_name}}</option>
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{$company->company_name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid category.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="category">Agent Name</label>
                                        <!--<input type="text" class="form-control"  placeholder="Mobile Phones" required>-->
                                        <select id="category" name="agent_id" class="custom-select form-control"
                                                required>
                                            <option value="">Select Agent</option>
                                            <option value="{{$bus->agent->id}}"
                                                    selected>{{$bus->agent->first_name}} {{$bus->agent->last_name}}</option>
                                            @foreach($agents as $agent)
                                                <option value="{{$agent->id}}">{{$agent->first_name}} {{$agent->last_name}}</option>
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
                            <h6 class="card-header white">Bus Details</h6>
                            <div class="card-body text-success">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom01">Make</label>
                                        <input type="text" name="make" class="form-control" id="validationCustom01"
                                               placeholder="Enter make" value="{{$bus->make}}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom02">Model</label>
                                        <input type="text" name="model" class="form-control" id="validationCustom02"
                                               placeholder="Enter model" value="{{$bus->model}}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category">License Plate Number</label>
                                        <input type="text" name="license_plate_number" class="form-control"
                                               id="validationCustom04"
                                               placeholder="Enter license plate number"
                                               value="{{$bus->license_plate_number}}"
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
                                               value="{{$bus->primary_color}}"
                                               required>
                                        <div class="invalid-feedback">
                                            Please provide a valid price.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="sku">Secondary Color</label>
                                        <input type="text" name="secondary_color" class="form-control" id="sku"
                                               placeholder="Enter secondary color"
                                               value="{{$bus->secondary_color}}"
                                               required>
                                        <div class="invalid-feedback">
                                            Please provide a valid sku.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-4">
                            <h6 class="card-header white">Vehicle Image</h6>
                            <div class="card-body">
                                <label for="file" class="col-form-label s-12">PROFILE PICTURE</label>
                                <div class="row">
                                    <div class="col-md-8 mb-4">
                                        @if($bus->image != '')
                                            <img id="blah" src="/bus_images/{{$bus->image}}" alt="your image"
                                                 class="img-thumbnail rounded float-left"/>
                                        @else
                                            <img id="blah" src="/user_avatars/placeholder.svg" alt="your image"
                                                 class="img-thumbnail rounded float-left"/>
                                        @endif

                                    </div>
                                    <div class="col-md-8 mb-4">
                                        <input hidden id="files" type='file' onchange="readURL(this);" name="file"/>
                                        <label for="files" class="btn btn-primary">Select picture</label>
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
                                    @if($bus->active == 1)
                                        <input type="checkbox" name="publish" value="publish"
                                               class="custom-control-input"
                                               id="customControlValidation1"
                                               required checked>
                                    @else
                                        <input type="checkbox" name="publish" value="publish"
                                               class="custom-control-input"
                                               id="customControlValidation1"
                                               required>
                                    @endif

                                    <label class="custom-control-label" for="customControlValidation1">Check to
                                        activate</label>
                                    <div class="invalid-feedback">Example invalid feedback text</div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent">
                                <input type="hidden" name="id" value="{{$bus->id}}">
                                <button class="btn btn-primary" type="submit"><i class="icon-save mr-2"></i>Save data
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection