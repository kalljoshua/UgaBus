@extends('...layouts.user_layout')
@section('title')
    <title>Book Bus Tickets For Your Next Trip</title>
@endsection
@section('content')

	@include('user.menu')
	<?php 
		if (Session::has('seats')) {
            $seats = Session::get('seats');
            Session::forget('seats');
        }else{
            $seats = 0; 
        }
	?>

	<!-- START: PAGE TITLE -->
	<div class="row page-title">
		<div class="container clear-padding text-center flight-title">
			<h3>YOUR SELECTION</h3>
			<h4>Grand Lilly</h4>
			<span><i class="fa fa-map-marker"></i> {{$route->travelfrom}} <i class="fa fa-map-marker"></i> {{$route->travelto}} <i class="fa fa-male"></i> Travellers(s) - {{$seats}}</span>
		</div>
	</div>
	<!-- END: PAGE TITLE -->

	<!-- START: BOOKING TAB -->
	<div class="row booking-tab">
		<div class="container clear-padding">
			<ul class="nav nav-tabs">
				<li class="col-md-4 col-sm-4 col-xs-4"><a data-toggle="tab" href="#" class="text-center"><i class="fa fa-edit"></i> <span>Review Booking</span></a></li>
				<li class="active col-md-4 col-sm-4 col-xs-4"><a data-toggle="tab" href="#passenger-info" class="text-center"><i class="fa fa-male"></i> <span>Payment Info</span></a></li>	
				<li class="col-md-4 col-sm-4 col-xs-4"><a data-toggle="tab" href="#" class="text-center"><i class="fa fa-check-square"></i> <span>Billing Info</span></a></li>
			</ul> 
		</div>
	</div>
	<div class="row booking-detail" style="background-color: white;">
		<div class="container clear-padding">
			<div class="tab-content">				
				<div id="passenger-info" class="tab-pane fade in active">
					<div class="col-md-8 col-sm-8">
						<div class="passenger-detail">
							<h3>Payment Info</h3>
							<div class="passenger-detail-body">
								@if(Auth::guard('user')->user())
								<form method="post" action="{{route('process.payment')}}">
									{{ csrf_field() }}
									<div class="col-md-6 ol-sm-6">
										<label>First Name</label>
										<input type="hidden" value="{{$route->id}}" name="route_id">
										<input type="hidden" value="{{$seats}}" name="seats">
										<input type="text" name="firstname" 
										value="{{Auth::guard('user')->user()->first_name}}" required class="form-control">
									</div>
									<div class="col-md-6 ol-sm-6">
										<label>Last Name</label>
										<input type="text" name="lastname"
										value="{{Auth::guard('user')->user()->last_name}}" required class="form-control">
									</div>
									<div class="col-md-6 ol-sm-6">
										<label>Email</label>
										<input type="email" name="email" 
										value="{{Auth::guard('user')->user()->email}}" required class="form-control">
									</div>
									<div class="col-md-6 ol-sm-6">
										<label>Phone Number</label>
										<input type="text" name="phonenumber" 
										value="{{Auth::guard('user')->user()->phone_no}}" class="form-control" required>
										<div class="clearfix"></div>
									</div>
									<br>

									<div class="clearfix"></div>
									<div class="clearfix"></div>

									<h4>Choose payment method</h4>

									<div class="col-md-12">
										<label data-toggle="collapse" data-target="#saved-card-1">
											<input type="radio" name="getway" value="mobile_money"> <span>Mobile Money</span></label>
										<div class="clearfix"></div>

										<label data-toggle="collapse" data-target="#saved-card-2">
											<input type="radio" name="getway" value="visa"> <span>Visa Card</span></label>
										<div class="clearfix"></div>

										<label data-toggle="collapse" data-target="#saved-card-2">
											<input type="radio" name="getway" value="terminal"> <span>At the Teminal</span></label>						
										<div class="clearfix"></div>
										<div>
											<button type="submit">CONFIRM BOOKING <i class="fa fa-chevron-right"></i></button>
										</div>
									
									</div>
								</form>
								@else
								<form method="post" action="{{route('process.payment')}}">
									{{ csrf_field() }}
									<div class="col-md-6 ol-sm-6">
										<label>First Name</label>
										<input type="hidden" value="{{$route->id}}" name="route_id">
										<input type="hidden" value="{{$seats}}" name="seats">
										<input type="text" name="firstname" placeholder="firstname" required class="form-control">
									</div>
									<div class="col-md-6 ol-sm-6">
										<label>Last Name</label>
										<input type="text" name="lastname" placeholder="lastname" required class="form-control">
									</div>
									<div class="col-md-6 ol-sm-6">
										<label>Phone Number</label>
										<input type="text" name="phonenumber" placeholder="number" class="form-control" required>
										<div class="clearfix"></div>
									</div>
									<br>

									<div class="clearfix"></div>
									<div class="clearfix"></div>

									<h4>Choose payment method</h4>

									<div class="col-md-12">
										<label data-toggle="collapse" data-target="#saved-card-1">
											<input type="radio" name="getway" value="mobile_money"> <span>Mobile Money</span></label>
										<div class="clearfix"></div>

										<label data-toggle="collapse" data-target="#saved-card-2">
											<input type="radio" name="getway" value="visa"> <span>Visa Card</span></label>
										<div class="clearfix"></div>

										<label data-toggle="collapse" data-target="#saved-card-2">
											<input type="radio" name="getway" value="terminal"> <span>At the Teminal</span></label>						
										<div class="clearfix"></div>
										<div>
											<button type="submit">CONFIRM BOOKING <i class="fa fa-chevron-right"></i></button>
										</div>
									
									</div>
								</form>
								@endif
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 booking-sidebar">
						<div class="sidebar-item">
							<h4><i class="fa fa-phone"></i>Need Help?</h4>
							<div class="sidebar-body text-center">
								<p>Need Help? Call us or drop a message. Our agents will be in touch shortly.</p>
								<h2>+91 1234567890</h2>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- END: BOOKING TAB -->

@endsection