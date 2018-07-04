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
                        Bus Companies
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active"  href="/admin/companies"><i class="icon icon-home2"></i>All Bus Companies</a>
                    </li>
                    <li>
                        <a class="nav-link"  href="/admin/companies/create" ><i class="icon icon-plus-circle"></i> Add New Bus Company</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel"
                 aria-labelledby="v-pills-all-tab">
                @include('flash::message')
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                        <tr class="no-b">
                                            {{--<th style="width: 30px">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" id="checkedAll"
                                                           class="custom-control-input"><label
                                                            class="custom-control-label" for="checkedAll"></label>
                                                </div>
                                            </th>--}}
                                            <th>COMPANY NAME</th>
                                            <th>ADDRESS</th>
                                            <th>CITY</th>
                                            <th>PHONE</th>
                                            <th>MOBILE</th>
                                            <th>WEBSITE</th>
                                            <th>BUS (ES)</th>
                                            <th>STATUS</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($companies as $company)
                                            <tr>
                                                {{--<td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input checkSingle"
                                                               id="user_id_{{$company->id}}" required><label
                                                                class="custom-control-label" for="user_id_{{$company->id}}"></label>
                                                    </div>
                                                </td>--}}

                                                <td>
                                                    <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                        @if($company->logo !='')
                                                            <img src="/company_logos/{{$company->logo}}" avatar-md circle
                                                                 alt="your image"/>
                                                        @else
                                                            {!! $char = substr($company->company_name, 0, 1); !!}
                                                            <span class="avatar-letter avatar-letter-{{strtolower($char)}}  avatar-md circle"></span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <strong>{{$company->company_name}}</strong>
                                                        </div>
                                                        <small> {{$company->email}}</small>
                                                    </div>
                                                </td>

                                                <td>{{$company->hq_address}}</td>
                                                <td>{{$company->hq_city}}</td>

                                                <td>{{$company->phone}}</td>
                                                <td>{{$company->mobile}}</td>
                                                <td>{{$company->website}}</td>
                                                <td>{{$company->buses->count()}}</td>
                                                <td><span class="r-3 badge badge-success ">Active</span></td>
                                                <td>
                                                    <a class="btn-fab btn-fab-sm btn-primary shadow text-white mr-3"
                                                       href="/admin/companies/{{$company->id}}/edit"><i
                                                                class="icon-pencil"></i></a>
                                                    <a class="btn-fab btn-fab-sm btn-danger shadow text-white"
                                                       href="/admin/companies/{{$company->id}}/delete"><i
                                                                class="icon-delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<nav class="my-3" aria-label="Page navigation">
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
    </div>
    <!--Add New Message Fab Button-->
    <a href="/admin/companies/create"
       class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i
                class="icon-add"></i></a>
@endsection