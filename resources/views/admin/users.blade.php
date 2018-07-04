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
                        Users
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="/admin/users"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i>All Users</a>
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
                                            <th>FULL NAME</th>
                                            <th>GENDER</th>
                                            <th>PHONE</th>
                                            <th>STATUS</th>
                                            <th>ACOUNT</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($users as $user)

                                            <tr>
                                                {{--<td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input checkSingle"
                                                               id="user_id_1" required><label
                                                                class="custom-control-label" for="user_id_1"></label>
                                                    </div>
                                                </td>--}}

                                                <td>
                                                    <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                        @if($user->logo !='')
                                                            <img src="/user_avatars/{{$user->avatar}}" avatar-md circle
                                                                 alt="{{$user->first_name}}"/>
                                                        @else
                                                            {!! $char = substr($user->first_name, 0, 1); !!}
                                                            <span class="avatar-letter avatar-letter-{{strtolower($char)}}  avatar-md circle"></span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <strong>{{$user->first_name}} {{$user->last_name}}</strong>
                                                        </div>
                                                        <small> {{$user->email}}</small>
                                                    </div>
                                                </td>

                                                <td>{{$user->gender}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td><span class="r-3 badge badge-success ">Verified</span></td>

                                                @if($user->is_suspended == 1)
                                                    <td><span class="r-3 badge badge-danger ">Suspended</span></td>
                                                @else
                                                    <td><span class="r-3 badge badge-warning ">Active</span></td>
                                                @endif
                                                <td>
                                                    @if($user->is_suspended == 1)
                                                        <a class="btn-fab btn-fab-sm btn-success shadow text-white mr-3"
                                                           href="/admin/users/{{$user->id}}/suspend"><i
                                                                    class="icon-play"></i></a>
                                                    @else
                                                        <a class="btn-fab btn-fab-sm btn-warning shadow text-white mr-3"
                                                           href="/admin/users/{{$user->id}}/suspend"><i
                                                                    class="icon-pause"></i></a>
                                                    @endif


                                                    <a class="btn-fab btn-fab-sm btn-danger shadow text-white"
                                                       href="/admin/users/{{$user->id}}/delete"><i
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
@endsection