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
                        Bookings
                    </h4>
                </div>
            </div>

            <div class="row">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-payments"
                           role="tab" aria-controls="v-pills-payments"><i class="icon icon-money-1"></i>All Bookings</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-timeline-tab" data-toggle="pill" href="#v-pills-timeline"
                           role="tab" aria-controls="v-pills-timeline" aria-selected="false"><i
                                    class="icon icon-cog"></i>Timeline</a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
                           role="tab" aria-controls="v-pills-settings" aria-selected="false"><i
                                    class="icon icon-cog"></i>Edit Profile</a>
                    </li>
                </ul>
            </div>

        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-payments" role="tabpanel"
                     aria-labelledby="v-pills-payments-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card no-b">
                                <div class="card-header white b-0 p-3">
                                    <h4 class="card-title">All Bookings</h4>
                                    <small class="card-subtitle mb-2 text-muted">Bookings made by users.</small>
                                </div>
                                <div class="collapse show" id="invoiceCard">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table id="recent-orders"
                                                   class="table table-hover mb-0 ps-container ps-theme-default">
                                                <thead class="bg-light">
                                                <tr>
                                                    <th>BID</th>
                                                    <th>Route</th>
                                                    <th>Company</th>
                                                    <th>User Name</th>
                                                    <th>Status</th>
                                                    <th>Seat(s)</th>
                                                    <th>Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($bookings as $booking)
                                                        <tr>
                                                            <td>PAP-10521</td>
                                                            <td><a href="#">{{$booking->route->travel_from}} To {{$booking->route->travel_to}}</a></td>
                                                            <td><a href="#">{{$booking->route->bus->agent->company}}</a></td>
                                                            <td>{{$booking->user->first_name}} {{$booking->user->last_name}}</td>
                                                            <td><span class="badge badge-success">Paid</span></td>
                                                            <td>{{$booking->number_of_seats}}</td>
                                                            <td>SHS {{$booking->route->unit_seat_price * $booking->number_of_seats}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="v-pills-timeline" role="tabpanel" aria-labelledby="v-pills-timeline-tab">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <ul class="timeline">
                                <!-- timeline time label -->
                                <li class="time-label">
                  <span class="badge badge-danger r-3">
                    10 Feb. 2014
                  </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="ion icon-envelope bg-primary"></i>
                                    <div class="timeline-item card">
                                        <div class="card-header white"><a href="#">Support Team</a> sent you an email
                                            <span class="time float-right"><i class="ion icon-clock-o"></i> 12:05</span>
                                        </div>
                                        <div class="card-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="card-footer">
                                            <a class="btn btn-primary btn-xs">Read more</a>
                                            <a class="btn btn-danger btn-xs">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="ion icon-user yellow"></i>

                                    <div class="timeline-item  card">

                                        <div class="card-header white"><h6><a href="#">Sarah Young</a> accepted your
                                                friend request<span class="float-right"><i class="ion icon-clock-o"></i> 5 mins ago</span>
                                            </h6></div>


                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="ion icon-comments bg-danger"></i>

                                    <div class="timeline-item  card">


                                        <div class="card-header white"><h6><a href="#">Jay White</a> commented on your
                                                post <span class="float-right"><i class="ion icon-clock-o"></i> 27 mins ago</span>
                                            </h6></div>

                                        <div class="card-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="card-footer">
                                            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <li class="time-label">
                  <span class="badge badge-success r-3">
                    3 Jan. 2014
                  </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="ion icon-camera indigo"></i>

                                    <div class="timeline-item  card">

                                        <div class="card-header white"><a href="#">Mina Lee</a> uploaded new photos<span
                                                    class="time float-right"><i class="ion icon-clock-o"></i> 2 days ago</span>
                                        </div>


                                        <div class="card-body">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="ion icon-video-camera bg-maroon"></i>

                                    <div class="timeline-item  card">
                                        <div class="card-header white"><a href="#">Mr. Doe</a> shared a video<span
                                                    class="time float-right"><i class="ion icon-clock-o"></i> 5 days ago</span>
                                        </div>


                                        <div class="card-body">
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item"
                                                        src="https://www.youtube.com/embed/tMWkeBIohBs"
                                                        allowfullscreen="" frameborder="0"></iframe>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="#" class="btn btn-xs bg-maroon">See comments</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <li>
                                    <i class="ion icon-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input class="form-control" id="inputName" placeholder="Name" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input class="form-control" id="inputEmail" placeholder="Email" type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input class="form-control" id="inputName" placeholder="Name" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                            <div class="col-sm-10">
                                <input class="form-control" id="inputSkills" placeholder="Skills" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <nav class="pt-3" aria-label="Page navigation">
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
            </nav>
        </div>
    </div>


@endsection