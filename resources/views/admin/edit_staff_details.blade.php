@extends('...layouts.admin_layout')
@section('title')
    <title>Staff</title>
@endsection
@section('content')
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <div class="pb-3">
                        <div class="image mr-3  float-left">
                            <img class="user_avatar no-b no-p" src="/user_avatars/{{$user->avatar}}" height="55px" alt="User Image">
                        </div>
                        <div>
                            <h6 class="p-t-10">{{$user->first_name}} {{$user->last_name}}</h6>
                            {{$user->email}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active"  href="/admin/staff"><i class="icon icon-home2"></i>All Admin Users</a>
                    </li>
                    <li>
                        <a class="nav-link"  href="/admin/staff/create" ><i class="icon icon-plus-circle"></i> Add New Admin User</a>
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
                    <form method="post" action="/admin/staff/update" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <h5 class="card-title">Admin details</h5>
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="fist_name" class="col-form-label s-12">FIRST NAME</label>
                                            <input id="first_name" name="first_name" placeholder="Enter First Name"
                                                   class="form-control r-0 light s-12 "
                                                   type="text"
                                                    value="{{$user->first_name}}">
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="last_name" class="col-form-label s-12">LAST NAME</label>
                                            <input id="last_name" name="last_name" placeholder="Enter Last Name"
                                                   class="form-control r-0 light s-12 "
                                                   type="text"
                                                   value="{{$user->last_name}}">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-6 m-0">
                                                <label for="username" class="col-form-label s-12">USER NAME</label>
                                                <input id="username" name="username" placeholder="Enter User Name"
                                                       class="form-control r-0 light s-12 date-picker"
                                                       type="text"
                                                       value="{{$user->username}}">
                                            </div>
                                            <div class="form-group col-6 m-0">
                                                <label for="dob" class="col-form-label s-12"><i class="icon-calendar mr-2"></i>DATE OF BIRTH</label>
                                                <input id="dob" name="dob" placeholder="Select Date of Birth"
                                                       class="form-control r-0 light s-12 datePicker"
                                                       data-time-picker="true"
                                                       data-format-date='Y/m/d'
                                                       type="date"
                                                       value="{{$user->date_of_birth}}">
                                            </div>
                                        </div>

                                        <div class="form-group m-0">
                                            <label for="gender" class="col-form-label s-12">GENDER</label>
                                            <br>
                                            @if($user->gender == 'male')
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
                                            @elseif($user->gender == 'female')
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
                                                @if($user->avatar != '')
                                                    <img id="blah" src="/user_avatars/{{$user->avatar}}" alt="your image"
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
                                        <label for="email" class="col-form-label s-12"><i class="icon-envelope-o mr-2"></i>Email</label>
                                        <input id="email" name="email" placeholder="user@email.com"
                                               class="form-control r-0 light s-12 "
                                               type="text"
                                               value="{{$user->email}}">
                                    </div>

                                    <div class="form-group col-4 m-0">
                                        <label for="phone" class="col-form-label s-12"><i class="icon-phone mr-2"></i>Phone</label>
                                        <input id="phone" name="phone"
                                               class="form-control r-0 light s-12 "
                                               type="text"
                                               value="{{$user->phone}}">
                                    </div>
                                    <div class="form-group col-4 m-0">
                                        <label for="mobile" class="col-form-label s-12"><i class="icon-mobile-phone mr-2"></i>Mobile</label>
                                        <input id="mobile" name="mobile"
                                               class="form-control r-0 light s-12 "
                                               type="text"
                                               value="{{$user->mobile}}">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-9 m-0">
                                        <label for="address"  class="col-form-label s-12">Address</label>
                                        <input type="text" name="staff_address"
                                               class="form-control r-0 light s-12" id="address"
                                               value="{{$user->address}}">
                                    </div>

                                    <div class="form-group col-3 m-0">
                                        <label for="inputCity" class="col-form-label s-12">City</label>
                                        <input type="text" name="staff_city"
                                               class="form-control r-0 light s-12" id="inputCity"
                                               value="{{$user->city}}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <h5 class="card-title">SECURITY</h5>

                                <div class="form-group m-0">
                                    <label for="fist_name" class="col-form-label s-12">NEW PASSWORD</label>
                                    <input id="first_name" name="password" placeholder="Enter Password" class="form-control r-0 light s-12 " type="password">
                                </div>
                                <div class="form-group m-0">
                                    <label for="last_name" class="col-form-label s-12">REPEAT PASSWORD</label>
                                    <input id="last_name" name="repeat_password" placeholder="Repeat Password" class="form-control r-0 light s-12 " type="password">
                                </div>
                                <div class="form-group m-0">
                                    <label for="fist_name" class="col-form-label s-12">ROLE</label>
                                    <!--<input type="text" class="form-control"  placeholder="Mobile Phones" required>-->
                                    <select id="category" name="role" class="custom-select form-control"
                                            required>
                                        @if($user->user_level == 1)
                                            <option value="" >Select Role</option>
                                            <option value="1" selected>Super Admin</option>
                                            <option value="2">Admin</option>
                                        @elseif($user->user_level == 2)
                                            <option value="" >Select Role</option>
                                            <option value="1">Super Admin</option>
                                            <option value="2" selected>Admin</option>
                                        @else
                                            <option value="" selected>Select Role</option>
                                            <option value="1">Super Admin</option>
                                            <option value="2">Admin</option>
                                        @endif
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid category.
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="card-body">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection