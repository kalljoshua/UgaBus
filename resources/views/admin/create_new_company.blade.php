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
                        <a class="nav-link"  href="/admin/companies"><i class="icon icon-home2"></i>All Bus Companies</a>
                    </li>
                    <li>
                        <a class="nav-link active"  href="/admin/companies/create" ><i class="icon icon-plus-circle"></i> Add New Bus Company</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form method="post" action="/admin/companies/save">
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
                                                   type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row mt-1">
                                    <div class="form-group col-4 m-0">
                                        <label for="email" class="col-form-label s-12"><i class="icon-envelope-o mr-2"></i>Email</label>
                                        <input id="email" name="email"
                                               placeholder="support@email.com"
                                               class="form-control r-0 light s-12 "
                                               type="text">
                                    </div>

                                    <div class="form-group col-4 m-0">
                                        <label for="phone" class="col-form-label s-12"><i class="icon-phone mr-2"></i>Phone</label>
                                        <input id="phone" name="phone" placeholder="05112345678"
                                               class="form-control r-0 light s-12 "
                                               type="text">
                                    </div>
                                    <div class="form-group col-4 m-0">
                                        <label for="mobile" class="col-form-label s-12"><i class="icon-mobile-phone mr-2"></i>Mobile</label>
                                        <input id="mobile" name="mobile"
                                               placeholder="eg: 0084709643"
                                               class="form-control r-0 light s-12 "
                                               type="text">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="website" class="col-form-label s-12">WEBSITE</label>
                                            <input id="website" name="first_name"
                                                   placeholder="http://"
                                                   class="form-control r-0 light s-12 "
                                                   type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-9 m-0">
                                        <label for="address"  class="col-form-label s-12">Address</label>
                                        <input type="text" name="address" class="form-control r-0 light s-12" id="address"
                                               placeholder="Enter Address">
                                    </div>

                                    <div class="form-group col-3 m-0">
                                        <label for="inputCity" class="col-form-label s-12">City</label>
                                        <input type="text" name="city" class="form-control r-0 light s-12" id="inputCity">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection