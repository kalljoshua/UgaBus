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
			<span><i class="fa fa-map-marker"></i> {{$route->travelfrom}} <i class="fa fa-map-marker"></i> {{$route->travelto}} <i class="fa fa-male"></i> Travellers(s) - {{$seats}}</span>
		</div>
	</div>
	<!-- END: PAGE TITLE -->

	<!-- START: BOOKING TAB -->
	<div class="row booking-tab">
		<div class="container clear-padding">
			<ul class="nav nav-tabs">
				<li class="active col-md-4 col-sm-4 col-xs-4"><a data-toggle="tab" href="#review-booking" class="text-center"><i class="fa fa-edit"></i> <span>Review Booking</span></a></li>
				<li class="col-md-4 col-sm-4 col-xs-4"><a data-toggle="tab" href="#passenger-info" class="text-center"><i class="fa fa-male"></i> <span>Passenger Info</span></a></li>	
				<li class="col-md-4 col-sm-4 col-xs-4"><a data-toggle="tab" href="#billing-info" class="text-center"><i class="fa fa-check-square"></i> <span>Billing Info</span></a></li>
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
								<h4>{{$route->bus['busname']}}</h4>
								<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
									<p>DEPARTURE</p>
									<p><i class="fa fa-map-marker"></i> {{$route->travelfrom}}</p>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
									<p>DESTINATION</p>
									<p><i class="fa fa-map-marker"></i> {{$route->travelto}}</p>
								</div>
								<div class="clearfix"></div>
								<p><span>Traveller</span> - {{$seats}}</p>
								<p><span>Depature Time</span> - {{$route->time_of_departure}}</p>
								<p><span>Terminal</span> - {{$route->starting_point}}</p>
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
										<td>UGX {{number_format("$route->price_total")}}</td>
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
										$total = $route->price_total * $seats;
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
								<h2>+91 1234567890</h2>
							</div>
						</div>
					</div>
				</div>
				<div id="passenger-info" class="tab-pane fade">
					<div class="col-md-8 col-sm-8">
						<div class="passenger-detail">
							<h3>Guest Details</h3>
							<div class="passenger-detail-body">
								<form >
									<div class="col-md-6 ol-sm-6">
										<label>First Name</label>
										<input type="text" name="firstname" required class="form-control">
									</div>
									<div class="col-md-6 ol-sm-6">
										<label>Last Name</label>
										<input type="text" name="lastname" required class="form-control">
									</div>
									<div class="col-md-6 ol-sm-6">
										<label>Email</label>
										<input type="email" name="email" required class="form-control">
									</div>
									<div class="col-md-6 ol-sm-6">
										<label>Verify Email</label>
										<input type="email" name="verify_email" class="form-control">
									</div>
									<div class="col-md-6 ol-sm-6">
										<label>Country Code</label>
										<select name="countrycode" class="form-control">
											<option>+1 United States</option>
											<option>+1 Canada</option>
											<option>+44 United Kingdom</option>
											<option>+91 India</option>
										</select>
									</div>
									<div class="col-md-6 ol-sm-6">
										<label>Phone Number</label>
										<input type="text" name="phonenumber" class="form-control" required>
									</div>
									<div class="col-md-12">
										<label><input type="checkbox" name="alert"> Send me newsletters and updates</label>
									</div>
									<div class="text-center">
										<button type="submit">CONTINUE <i class="fa fa-chevron-right"></i></button>
									</div>
								</form>
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
				<div id="billing-info" class="tab-pane fade">
					<div class="col-md-8 col-sm-8">
						<div class="passenger-detail">
							<h3>Total Payment to be made $499</h3>
							<div class="passenger-detail-body">
								<div class="saved-card">
									<form >
										<label data-toggle="collapse" data-target="#saved-card-1"><input type="radio" name="card"> <span>Bank of America 1234 XXXX XXXX 1290</span></label>
										<div id="saved-card-1" class="collapse">
											<div class="col-md-4 col-sm-4">
												<label>CVV</label>
												<input type="password" required class="form-control">
											</div>
										</div>
										<div class="clearfix"></div>
										<label data-toggle="collapse" data-target="#saved-card-2"><input type="radio" name="card"> <span>State Bank of India 1234 XXXX XXXX 1290</span></label>
										<div id="saved-card-2" class="collapse">
											<div class="col-md-4 col-sm-4">
												<label>CVV</label>
												<input type="password" required class="form-control">
											</div>
										</div>
										<div class="clearfix"></div>
										<div>
											<button type="submit">CONFIRM BOOKING <i class="fa fa-chevron-right"></i></button>
										</div>
									</form>
								</div>	
								<div class="payment-seperator clearfix"></div>
								<div class="add-new-card">
									<h4>Add New Card</h4>
									<form >
										<div class="col-md-6 ol-sm-6">
											<label>Card Type</label>
											<select name="carttype" class="form-control">
												<option>Credit Card</option>
												<option>Debit Card</option>
												<option>Gift Card</option>
											</select>
										</div>
										<div class="col-md-6 ol-sm-6">
											<label>Card Number</label>
											<input type="text" name="cardnumber" required class="form-control">
										</div>
										<div class="col-md-6 ol-sm-6">
											<label>Card Expiry</label>
											<select name="cardexpiry" class="form-control">
												<option>Select</option>
												<option>Dec 2015</option>
												<option>Jan 2016</option>
												<option>Feb 2016</option>
												<option>Mar 2016</option>
												<option>Apr 2016</option>
											</select>
										</div>
										<div class="col-md-6 ol-sm-6">
											<label>CVV Number</label>
											<input type="password" name="cvvnumber" class="form-control">
										</div>
										<div class="col-md-12">
											<label><input type="checkbox" name="alert"> Save this card for future</label>
										</div>
										<div>
											<button type="submit">CONFIRM BOOKING <i class="fa fa-chevron-right"></i></button>
										</div>
									</form>
								</div>
								<div class="payment-seperator clearfix"></div>
								<div class="paypal-pay">
									<h4>Pay Using Paypal</h4>
									<div class="col-md-2 col-sm-2 col-xs-4">
										<i class="fa fa-paypal"></i>
									</div>
									<div class="col-md-10 col-sm-10 col-xs-8">
										<a href="#">CONFIRM BOOKING</a>
									</div>
								</div>
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