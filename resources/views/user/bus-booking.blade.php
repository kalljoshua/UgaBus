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
							<div class="col-md-4 col-sm-6 clear-padding">
								<img src="/client_inc/assets/images/tour2.jpg" alt="cruise">
							</div>
							<div class="col-md-6 col-sm-6">
								<h4>{{$route->bus->agent['company']}}</h4>
								<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
									<p>DEPARTURE</p>
									<p><i class="fa fa-map-marker"></i> {{$route->travel_from}}</p>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
									<p>DESTINATION</p>
									<p><i class="fa fa-map-marker"></i> {{$route->travel_to}}</p>
								</div>
								<div class="clearfix"></div>
								<p><span>Traveller</span> - {{$seats}}</p>
								<p><span>Depature Time</span> - {{$route->time_of_departure}}</p>
								<p><span>Terminal</span> - {{$route->bus->park->park_name}}</p>
							</div>
							<div class="clearfix visible-sm-block"></div>
							<div class="col-md-2 text-center">
								<a href="{{ URL::previous() }}">CHANGE</a>
							</div>
						</div>
						
							<div class="col-md-12 col-sm-12 text-right">
									<div class="social-media-login">
										<a href="{{route('make.payment',['id'=>$route->id])}}"><i class="fa fa-chevron-right"></i>PROCEED TO PAYMENT</a>
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
									<tr>
										<td>Service Tax</td>
										<td>$50</td>
									</tr>
									<tr>
										<td>Other Taxes</td>
										<td>$20</td>
									</tr>
									<?php 
										$total = $route->unit_seat_price * $seats;
										Session::put('total_price', $total);
										Session::put('seats', $seats);
									?>
									<tr>
										<td>You Pay</td>
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