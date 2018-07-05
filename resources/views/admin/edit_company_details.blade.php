@extends('...layouts.admin_layout')
@section('title')
    <title>Companies</title>
@endsection
@section('content')
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-database"></i>
                        Bus Companies
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link" href="/admin/companies"><i class="icon icon-home2"></i>All Bus Companies</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="/admin/companies/create"><i class="icon icon-plus-circle"></i>
                            Add New Bus Company</a>
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
                    <form method="post" action="/admin/companies/update" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <h5 class="card-title">About Company</h5>
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="company_name" class="col-form-label s-12">COMPANY NAME</label>
                                            <input id="company_name" name="company_name"
                                                   placeholder="Enter Company Name"
                                                   class="form-control r-0 light s-12 "
                                                   type="text"
                                                    value="{{$company->company_name}}">
                                        </div>
                                        <div class="form-row mt-1">
                                            <div class="form-group col-4 m-0">
                                                <label for="email" class="col-form-label s-12"><i
                                                            class="icon-envelope-o mr-2"></i>Email</label>
                                                <input id="email" name="email"
                                                       placeholder="support@email.com"
                                                       class="form-control r-0 light s-12 "
                                                       type="text"
                                                        value="{{$company->email}}">
                                            </div>

                                            <div class="form-group col-4 m-0">
                                                <label for="phone" class="col-form-label s-12"><i
                                                            class="icon-phone mr-2"></i>Phone</label>
                                                <input id="phone" name="phone" placeholder="05112345678"
                                                       class="form-control r-0 light s-12 "
                                                       type="text"
                                                        value="{{$company->phone}}">
                                            </div>
                                            <div class="form-group col-4 m-0">
                                                <label for="mobile" class="col-form-label s-12"><i
                                                            class="icon-mobile-phone mr-2"></i>Mobile</label>
                                                <input id="mobile" name="mobile"
                                                       placeholder="eg: 0084709643"
                                                       class="form-control r-0 light s-12 "
                                                       type="text"
                                                        value="{{$company->mobile}}">
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group m-0">
                                                    <label for="website" class="col-form-label s-12">WEBSITE</label>
                                                    <input id="website" name="website"
                                                           placeholder="http://"
                                                           class="form-control r-0 light s-12 "
                                                           type="text"
                                                            value="{{$company->website}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group m-0">
                                                    <label for="website" class="col-form-label s-12">FACEBOOK</label>
                                                    <input id="website" name="facebook"
                                                           placeholder="http://"
                                                           class="form-control r-0 light s-12 "
                                                           type="text"
                                                            value="{{$company->facebook}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group m-0">
                                                    <label for="website" class="col-form-label s-12">TWITTER</label>
                                                    <input id="website" name="twitter"
                                                           placeholder="http://"
                                                           class="form-control r-0 light s-12 "
                                                           type="text"
                                                            value="{{$company->twitter}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 offset-md-1">
                                        <label for="file" class="col-form-label s-12">LOGO</label>
                                        <div class="dz-default dz-message">
                                            <div>
                                                @if($company->logo != '')
                                                    <img id="blah" src="/company_logos/{{$company->logo}}" alt="your image"
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
                                <div class="form-row">
                                    <div class="form-group col-9 m-0">
                                        <label for="address" class="col-form-label s-12">Address</label>
                                        <input type="text" name="address" class="form-control r-0 light s-12"
                                               id="address"
                                               placeholder="Enter Address"
                                                value="{{$company->hq_address}}">
                                    </div>

                                    <div class="form-group col-3 m-0">
                                        <label for="inputCity" class="col-form-label s-12">City</label>
                                        <input type="text" name="city" class="form-control r-0 light s-12"
                                               id="inputCity"
                                                value="{{$company->hq_city}}">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <input type="hidden" name="id" value="{{$company->id}}">
                                <button type="submit" class="btn btn-primary btn-lg"><i
                                            class="icon-save mr-2"></i>Save
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