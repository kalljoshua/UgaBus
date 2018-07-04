@extends('...layouts.user_layout')
@section('title')
    <title>Book Bus Tickets For Your Next Trip</title>
@endsection
@section('content')

	@include('user.menu')

	<!-- START: PAGE TITLE -->
	<div class="row page-title">
		<div class="container clear-padding text-center flight-title">
			<h3>YOUR SELECTION</h3>
			<h4>Grand Lilly</h4>
			<span><i class="fa fa-map-marker"></i> {{$route->travel_from}} <i class="fa fa-map-marker"></i> {{$route->travel_to}} <i class="fa fa-male"></i> Travellers(s) - {{$seats}}</span>
		</div>
	</div>
	<!-- END: PAGE TITLE -->

	<!-- START: BOOKING TAB -->
	<div class="row booking-tab">
		<div class="container clear-padding">
			<ul class="nav nav-tabs">
				<li class="active col-md-4 col-sm-4 col-xs-4"><a data-toggle="tab" href="#review-booking" class="text-center"><i class="fa fa-edit"></i> <span>Review Booking</span></a></li>
				<li class="col-md-4 col-sm-4 col-xs-4"><a data-toggle="tab" href="#" class="text-center"><i class="fa fa-male"></i> <span>Passenger Info</span></a></li>	
				<li class="col-md-4 col-sm-4 col-xs-4"><a data-toggle="tab" href="#" class="text-center"><i class="fa fa-check-square"></i> <span>Billing Info</span></a></li>
			</ul> 
		</div>
	</div>
	<div class="row booking-detail" style="background-color: white;">
		<div class="container clear-padding">
			<div class="tab-content">
				<div id="review-booking" class="tab-pane fade in active">
					<div class="col-md-8 col-sm-8">
						<div class="booking-summary-v2">
							<div class="flight-list-v2">
								<div class="flight-list-main">	
									<div class="col-md-2 col-sm-2 text-center airline">
										<img src="/company_logos/{{$route->bus->company->logo}}" alt="cruise">
										<h6>{{$route->bus->company->company_name}}</h6>
									</div>
									<div class="col-md-3 col-sm-3 departure">
										<h3><i class="fa fa-map-marker"></i> {{$route->travel_from}} {{$route->time_of_departure}}</h3>
										<h5 class="bold">SAT, 21 SEP</h5>
										<h5>{{$route->bus->company->hq_address}}, {{$route->travel_from}}</h5>
									</div>
									<div class="col-md-4 col-sm-4 stop-duration">
										<div class="flight-direction">
										</div>
										<div class="duration text-center">
											<span><i class="fa fa-user"></i> {{$seats}} Seat(s)</span>
										</div>
									</div>
									<div class="col-md-3 col-sm-3 destination">
										<h3><i class="fa fa-map-marker"></i> {{$route->travel_to}} {{$route-> 	estimated_time_of_arrival}}</h3>
										<h5 class="bold">SAT, 21 SEP</h5>
										<h5>{{$route->travel_to}}</h5>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							
						</div>
							<div class="col-md-12 col-sm-12">
								<div class="social-media-login pull-left">
									<a href="{{ URL::previous() }}"><i class="fa fa-undo"></i> CHANGE</a>
								</div>
								<div class="social-media-login pull-right">
									<a href="{{route('make.payment')}}"><i class="fa fa-chevron-right"></i>PROCEED TO PAYMENT</a>
								</div>
							</div>
					</div>
					<div class="col-md-4 col-sm-4 booking-sidebar">
						<div class="sidebar-item">
							<h4><i class="fa fa-bookmark"></i>Price Details</h4>
							<div class="sidebar-body">
								<table class="table">
									<tr>
										<td>Per Person</td>
										<td>UGX {{number_format("$route->unit_seat_price")}}</td>
									</tr>
									<tr>
										<td>Seats Booked</td>
										<td>{{$seats}}</td>
									</tr>
									<?php 
										$total = $route->unit_seat_price * $seats;
										Session::put('total_price', $total);
										Session::put('seats', $seats);
										Session::put('route', $route->id);
									?>
									<tr>
										<td class="total">Total Pay</td>
										<td class="total">UGx {{number_format("$total")}}</td>
									</tr>
								</table>
							</div>
						</div>
						
						<div class="sidebar-item contact-box">
							<h4><i class="fa fa-phone"></i>Need Help?</h4>
							<div class="sidebar-body text-center">
								<p>Need Help? Call us or drop a message. Our agents will be in touch shortly.</p>
								<h2>+256 704741443</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: BOOKING TAB -->

@endsection