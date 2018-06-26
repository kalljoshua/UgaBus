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
                        Agents
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" href="/admin/agents"><i class="icon icon-home2"></i>All Agents</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/admin/agents/create"><i class="icon icon-plus-circle"></i> Add
                            New Agent</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            @include('flash::message')
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form method="post" action="/admin/agents/update" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <h5 class="card-title">Edit Agent Details</h5>
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="fist_name" class="col-form-label s-12">FIRST NAME</label>
                                            <input id="first_name" name="first_name" placeholder="Enter First Name"
                                                   class="form-control r-0 light s-12 "
                                                   type="text"
                                                    value="{{$agent->first_name}}">
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="last_name" class="col-form-label s-12">LAST NAME</label>
                                            <input id="last_name" name="last_name" placeholder="Enter Last Name"
                                                   class="form-control r-0 light s-12 "
                                                   type="text"
                                                   value="{{$agent->last_name}}">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-6 m-0">
                                                <label for="username" class="col-form-label s-12">USER NAME</label>
                                                <input id="username" name="username" placeholder="Enter User Name"
                                                       class="form-control r-0 light s-12 date-picker"
                                                       type="text"
                                                       value="{{$agent->username}}">
                                            </div>
                                            <div class="form-group col-6 m-0">
                                                <label for="dob" class="col-form-label s-12"><i
                                                            class="icon-calendar mr-2"></i>DATE OF BIRTH</label>
                                                <input id="dob" name="dob" placeholder="Select Date of Birth"
                                                       class="form-control r-0 light s-12 datePicker"
                                                       data-time-picker="true"
                                                       data-format-date='Y/m/d'
                                                       type="date"
                                                       value="{{$agent->date_of_birth}}">
                                            </div>
                                        </div>

                                        <div class="form-group m-0">
                                            <label for="gender" class="col-form-label s-12">GENDER</label>
                                            <br>
                                            @if($agent->gender == 'male')
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="male" name="gender" value="male" class="custom-control-input" checked>
                                                    <label class="custom-control-label m-0" for="male">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="female" name="gender" value="female" class="custom-control-input">
                                                    <label class="custom-control-label m-0" for="female">Female</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="other" name="gender" value="other" class="custom-control-input">
                                                    <label class="custom-control-label m-0" for="other">Other</label>
                                                </div>
                                            @elseif($agent->gender == 'female')
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="male" name="gender" value="male" class="custom-control-input">
                                                    <label class="custom-control-label m-0" for="male">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="female" name="gender" value="female" class="custom-control-input" checked>
                                                    <label class="custom-control-label m-0" for="female">Female</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="other" name="gender" value="other" class="custom-control-input">
                                                    <label class="custom-control-label m-0" for="other">Other</label>
                                                </div>
                                            @else
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="male" name="gender" value="male" class="custom-control-input">
                                                    <label class="custom-control-label m-0" for="male">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="female" name="gender" value="female" class="custom-control-input">
                                                    <label class="custom-control-label m-0" for="female">Female</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="other" name="gender" value="other" class="custom-control-input" checked>
                                                    <label class="custom-control-label m-0" for="other">Other</label>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3 offset-md-1">
                                        <label for="file" class="col-form-label s-12">PROFILE PICTURE</label>
                                        <div class="dz-default dz-message">
                                            <div>
                                                @if($agent->avatar != '')
                                                    <img id="blah" src="/user_avatars/{{$agent->avatar}}" alt="your image"
                                                         class="img-thumbnail rounded float-left"/>
                                                @else
                                                    <img id="blah" src="/user_avatars/placeholder.svg" alt="your image"
                                                         class="img-thumbnail rounded float-left"/>
                                                @endif
                                            </div>
                                        </div>
                                        <input hidden id="files" type='file' onchange="readURL(this);" name="file"/>
                                        <label for="files" class="btn btn-primary">Select picture</label>
                                    </div>

                                </div>

                                <div class="form-row mt-1">
                                    <div class="form-group col-4 m-0">
                                        <label for="email" class="col-form-label s-12"><i
                                                    class="icon-envelope-o mr-2"></i>Email</label>
                                        <input id="email" name="email" placeholder="user@email.com"
                                               class="form-control r-0 light s-12 "
                                               type="text"
                                               value="{{$agent->email}}">
                                    </div>

                                    <div class="form-group col-4 m-0">
                                        <label for="phone" class="col-form-label s-12"><i class="icon-phone mr-2"></i>Phone</label>
                                        <input id="phone" name="phone" placeholder="05112345678"
                                               class="form-control r-0 light s-12 "
                                               type="text"
                                               value="{{$agent->phone}}">
                                    </div>
                                    <div class="form-group col-4 m-0">
                                        <label for="mobile" class="col-form-label s-12"><i
                                                    class="icon-mobile-phone mr-2"></i>Mobile</label>
                                        <input id="mobile" name="mobile" placeholder="eg: 3334709643"
                                               class="form-control r-0 light s-12 "
                                               type="text"
                                               value="{{$agent->mobile}}">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-9 m-0">
                                        <label for="address" class="col-form-label s-12">Address</label>
                                        <input type="text" name="agent_address" class="form-control r-0 light s-12"
                                               id="address"
                                               placeholder="Enter Address"
                                               value="{{$agent->agent_address}}">
                                    </div>

                                    <div class="form-group col-3 m-0">
                                        <label for="inputCity" class="col-form-label s-12">City</label>
                                        <input type="text" name="agent_city" class="form-control r-0 light s-12"
                                               id="inputCity"
                                               value="{{$agent->agent_city}}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            {{--<div class="card-body">
                                <h5 class="card-title">COMPANY</h5>
                                <div class="form-row">
                                    <div class="form-group col-5 m-0">
                                        <label for="roll1" class="col-form-label s-12">COMPANY NAME</label>
                                        <input id="roll1" name="company" placeholder="Enter Company Name"
                                               class="form-control r-0 light s-12 " type="text">
                                    </div>
                                </div>
                            </div>
                            <hr>--}}
                            <div class="card-body">
                                <input type="hidden" name="user_id" value="{{$agent->id}}">
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