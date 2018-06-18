@extends('...layouts.user_layout')
@section('title')
    <title>Book Bus Tickets For Your Next Trip</title>
@endsection
@section('content')

@include('user.menu')

<!-- START: USER PROFILE -->
<div class="row user-profile">
		<div class="container">
			<div class="col-md-12 user-name">
				<h3>Welcome, {{$user->last_name}}</h3>
			</div>
			<div class="col-md-2 col-sm-2">
				<div class="user-profile-tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" 
						href="#profile-overview" class="text-center">
						<i class="fa fa-bolt"></i> <span>Overview</span></a></li>
						<li><a data-toggle="tab" href="#booking" 
						class="text-center"><i class="fa fa-history"></i> 
						<span>Bookings</span></a></li>	
						<li><a data-toggle="tab" href="#profile" 
						class="text-center"><i class="fa fa-user"></i> 
						<span>Profile</span></a></li>
						<li><a data-toggle="tab" href="#cards" 
						class="text-center"><i class="fa fa-credit-card"></i> 
						<span>My Wallet</span></a></li>						
					</ul>
				</div>
			</div>
			<div class="col-md-10 col-sm-10">
				<div class="tab-content">
					<div id="profile-overview" class="tab-pane fade in active">
						<div class="col-md-6">
							<div class="brief-info">
								<div class="col-md-2 col-sm-2 clear-padding">
									<img src="assets/images/user1.jpg" alt="cruise">
								</div>
								<div class="col-md-10 col-sm-10">
									<h3>{{$user->first_name}} {{$user->last_name}}</h3>
									<h5><i class="fa fa-envelope-o"></i>
									{{$user->email}}</h5>
									<h5><i class="fa fa-phone"></i>{{$user->phone}}</h5>
									<h5><i class="fa fa-map-marker"></i>Burbank, USA</h5>
								</div>
								<div class="clearfix"></div>
								<div class="brief-info-footer">
									<a data-toggle="tab" href="#profile"><i class="fa fa-edit"></i>Edit Profile</a>
									<a href="{{route('route.listing')}}"><i class="fa fa-plus"></i>Book a bus</a>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="most-recent-booking">
								<h4>Recent Travels</h4>
								@foreach($bookings as $booking)
								<div class="field-entry">
									<div class="col-md-6 col-sm-4 col-xs-4 clear-padding">
										<p><i class="fa fa-bus"></i>{{$booking->route->travel_from}}<i class="fa fa-long-arrow-right"></i>{{$booking->route->travel_to}}</p>
									</div>
									<div class="col-md-4 col-sm-6 col-xs-6">
										<p class="confirmed"><i class="fa fa-check"></i>Confirmed</p>
									</div>
									<div class="col-md-2 col-sm-2 col-xs-2 text-center clear-padding">
										<a href="#">Detail</a>
									</div>
								</div>
								<div class="clearfix"></div>
								@endforeach
							</div>
						</div>
						<div class="col-md-6">
							<!--<div class="user-notification">
									<h4>Notification</h4>
									<div class="notification-body">
										<div class="notification-entry">
											<p><i class="fa fa-plane"></i> Domestic Flights Starting from $199 <span class="pull-right">1m ago</span></p>
										</div>
										<div class="notification-entry">
											<p><i class="fa fa-bed"></i> 20% Cashback on hotel booking <span class="pull-right">1h ago</span></p>
										</div>
										<div class="notification-entry">
											<p><i class="fa fa-bolt"></i> 50% off on all items <span class="pull-right">08h ago</span></p>
										</div>
										<div class="notification-entry">
											<p><i class="fa fa-sun-o"></i> New Year special offer <span class="pull-right">1d ago</span></p>
										</div>
										<div class="notification-entry">
											<p><i class="fa fa-plane"></i> Domestic Flights Starting from $199 <span class="pull-right">1m ago</span></p>
										</div>
										<div class="notification-entry">
											<p><i class="fa fa-bed"></i> 20% Cashback on hotel booking <span class="pull-right">1h ago</span></p>
										</div>
									</div>
							</div>-->
							<div class="user-profile-offer">
								<h4>Offers For You</h4>
								<div class="offer-body">
									<div class="offer-entry">
										<div class="col-md-4 col-sm-4 col-xs-4 offer-left text-center">	
											<p>20% OFF</p>
										</div>
										<div class="col-md-8 col-sm-8 col-xs-8 offer-right">
											<p>Get 20% OFF on flights when you pay with your Bank of America Credit Card. <a href="#">Book Now</a></p>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="offer-entry">
										<div class="col-md-4 col-sm-4 col-xs-4 offer-left text-center">	
											<p>30% OFF</p>
										</div>
										<div class="col-md-8 col-sm-8 col-xs-8 offer-right">
											<p>Get 30% OFF on flights when you pay with your Bank of America Credit Card. <a href="#">Book Now</a></p>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="offer-entry">
										<div class="col-md-4 col-sm-4 col-xs-4 offer-left text-center">	
											<p>10% OFF</p>
										</div>
										<div class="col-md-8 col-sm-8 col-xs-8 offer-right">
											<p>Get 10% OFF on flights when you pay with your Bank of America Credit Card. <a href="#">Book Now</a></p>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>

						</div>
					</div>
					<div id="booking" class="tab-pane fade in">
						<div class="col-md-3 col-sm-3 col-xs-6">
							<form>
								<select class="form-control">
									<option>All Bookings</option>
									<option>Hotel</option>
									<option>Flight</option>
									<option>Holiday</option>
									<option>Cruise</option>
								</select>
							</form>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12">
							@foreach($bookings as $booking)
							<div class="item-entry">
								<span>Order ID: CR1234</span>
								<div class="item-content">
									<div class="item-body">
										<div class="col-md-2 col-sm-2 clear-padding text-center">
											<img src="assets/images/offer1.jpg" alt="cruise">
										</div>
										<div class="col-md-4 col-sm-4">
											<h4>{{$booking->route->bus->agent['company']}} <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
											<p>Leaving from: {{$booking->route->travel_from}} </p>
											<p>Going to: {{$booking->route->travel_to}}</p>
										</div>
										<div class="col-md-3 col-sm-3">
											<p class="confirmed"><i class="fa fa-check"></i>Confirmed</p>
										</div>
										<div class="col-md-3 col-sm-3">
											<p><a href="#">Details</a></p>
											<p><a data-toggle="modal" data-target="#myModal{{$booking->id}}" class="btn-info">Review <i class="fa fa-reply"></i></a></p>
										</div>
									</div>
									<div class="item-footer">
										<p><strong>Travel Date:</strong> {{$booking->created_at}}<strong>Order Total:</strong> UGx {{number_format($booking->route->unit_seat_price)}}</p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="myModal{{$booking->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
							      </div>
							      <div class="modal-body">
							     Ved prakash 9752224368
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button type="button" class="btn btn-primary">Save changes</button>
							      </div>
							    </div>
							  </div>
							</div>
							@endforeach
						</div>
					</div>
					<div id="profile" class="tab-pane fade in">
						<div class="col-md-6">
							<div class="user-personal-info">
								<h4>Personal Information</h4>
								<div class="user-info-body">
									<form method="post" action="{{route('profile.update')}}">
										{{csrf_field()}}
										<div class="col-md-6 col-sm-6">
											<label>First Name</label>
											<input type="text" name="fname" value="{{Auth::guard('user')->user()->first_name}}" class="form-control">
										</div>
										<div class="col-md-6 col-sm-6">
											<label>First Name</label>
											<input type="text" name="lname" value="{{Auth::guard('user')->user()->last_name}}" class="form-control">
										</div>
										<div class="clearfix"></div>
										<div class="col-md-12">
											<label>Email-ID</label>
											<input type="email" name="email" value="{{Auth::guard('user')->user()->email}}" class="form-control">
										</div>
										<div class="col-md-12">
											<label>Contact Number</label>
											<input type="text" name="contact" value="{{Auth::guard('user')->user()->phone}}" class="form-control">
										</div>	
										<div class="col-md-12">
											<label>Upload Avatar</label>
											<input type="file" name="profile" class="upload-pic">
										</div>
										<div class="clearfix"></div>
										<div class="col-md-6 col-sm-6 col-xs-6 text-center">
											 <button type="submit">SAVE CHANGES</button>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6 text-center">
											<a href="#">CANCEL</a>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="user-change-password">
								<h4>Change Password</h4>
								<div class="change-password-body">
									<form method="post" action="{{route('password.reset')}}">
										{{ csrf_field() }}
										<div class="col-md-12">
											<label>Old Password</label>
											<input type="password" placeholder="Old Password" class="form-control" name="oldpass">
										</div>
										<div class="col-md-12">
											<label>New Password</label>
											<input type="password" placeholder="New Password" class="form-control" name="newpass">
										</div>
										<div class="col-md-12">
											<label>Confirm Password</label>
											<input type="password" placeholder="Confirm Password" class="form-control" name="confirmpass">
										</div>
										<div class="col-md-12 text-center">
											 <button type="submit">SAVE CHANGES</button>
										</div>
									</form>
								</div>
							</div>
							<!---<div class="user-preference">
								<h4 data-toggle="collapse" data-target="#flight-preference" aria-expanded="false" aria-controls="flight-preference">
										<i class="fa fa-plane"></i> Flight Preference <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
								</h4>
								<div class="collapse" id="flight-preference">
									<form >
										<div class="col-md-6 col-sm-6">
											<label>Price Range</label>
											<select class="form-control" name="flight-price-range">
												<option>Upto $199</option>
												<option>Upto $250</option>
												<option>Upto $499</option>
												<option>Upto $599</option>
												<option>Upto $1000</option>
											</select>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Food Preference</label>
											<select class="form-control" name="flight-food">
												<option>Indian</option>
												<option>Chineese</option>
												<option>Sea Food</option>
											</select>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Airline</label>
											<select class="form-control" name="flight-airline">
												<option>Indigo</option>
												<option>Vistara</option>
												<option>Spicejet</option>
											</select>
										</div>
										<div class="clearfix"></div>
										<div class="col-md-12 text-center">
											 <button type="submit">SAVE CHANGES</button>
										</div>
									</form>
								</div>
							</div>-->
							<!---<div class="user-preference">
								<h4 data-toggle="collapse" data-target="#hotel-preference" aria-expanded="false" aria-controls="hotel-preference">
										<i class="fa fa-bed"></i> Hotel Preference <span class="pull-right"><i class="fa fa-chevron-down"></i></span>
								</h4>
								<div class="collapse" id="hotel-preference">
									<form >
										<div class="col-md-6 col-sm-6">
											<label>Price Range</label>
											<select class="form-control" name="hotel-price-range">
												<option>Upto $199</option>
												<option>Upto $250</option>
												<option>Upto $499</option>
												<option>Upto $599</option>
												<option>Upto $1000</option>
											</select>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Food Preference</label>
											<select class="form-control" name="hotel-food">
												<option>Indian</option>
												<option>Chineese</option>
												<option>Sea Food</option>
											</select>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Facilities</label>
											<select class="form-control" name="hotel-facilities">
												<option>WiFi</option>
												<option>Bar</option>
												<option>Restaurant</option>
											</select>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Rating</label>
											<select class="form-control" name="hotel-facilities">
												<option>5</option>
												<option>4</option>
												<option>3</option>
											</select>
										</div>
										<div class="clearfix"></div>
										<div class="col-md-12 text-center">
											 <button type="submit">SAVE CHANGES</button>
										</div>
									</form>
								</div>
							</div>-->
						</div>
					</div>
					<div id="wishlist" class="tab-pane fade in">
						<div class="col-md-12">
							<div class="item-entry">
								<span><i class="fa fa-hotel"></i> Hotel</span>
								<div class="item-content">
									<div class="item-body">
										<div class="col-md-2 col-sm-2 clear-padding text-center">
											<img src="assets/images/offer1.jpg" alt="cruise">
										</div>
										<div class="col-md-7 col-sm-7">
											<h4>Grand Lilly <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
										</div>
										<div class="col-md-3 col-sm-3">
											<p><a href="#">Remove</a></p>
										</div>
									</div>
									<div class="item-footer">
										<p><strong>Order Total:</strong> $566 <a href="#">Book Now</a></p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="item-entry">
								<span><i class="fa fa-hotel"></i> Hotel</span>
								<div class="item-content">
									<div class="item-body">
										<div class="col-md-2 col-sm-2 clear-padding text-center">
											<img src="assets/images/offer2.jpg" alt="cruise">
										</div>
										<div class="col-md-7 col-sm-7">
											<h4>Grand Lilly <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
										</div>
										<div class="col-md-3 col-sm-3">
											<p><a href="#">Remove</a></p>
										</div>
									</div>
									<div class="item-footer">
										<p><strong>Order Total:</strong> $566 <a href="#">Book Now</a></p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="item-entry">
								<span><i class="fa fa-hotel"></i> Hotel</span>
								<div class="item-content">
									<div class="item-body">
										<div class="col-md-2 col-sm-2 clear-padding text-center">
											<img src="assets/images/offer3.jpg" alt="cruise">
										</div>
										<div class="col-md-7 col-sm-7">
											<h4>Grand Lilly <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
										</div>
										<div class="col-md-3 col-sm-3">
											<p><a href="#">Remove</a></p>
										</div>
									</div>
									<div class="item-footer">
										<p><strong>Order Total:</strong> $566 <a href="#">Book Now</a></p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="item-entry">
								<span><i class="fa fa-plane"></i> Flight</span>
								<div class="item-content">
									<div class="item-body">
										<div class="col-md-2 col-sm-2 clear-padding text-center">
											<img src="assets/images/offer2.jpg" alt="cruise">
										</div>
										<div class="col-md-7 col-sm-7">
											<h4>New York <i class="fa fa-long-arrow"></i> New Delhi</h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
										</div>
										<div class="col-md-3 col-sm-3">
											<p><a href="#">Remove</a></p>
										</div>
									</div>
									<div class="item-footer">
										<p><strong>Order Total:</strong> $566 <a href="#">Book Now</a></p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="item-entry">
								<span><i class="fa fa-suitcase"></i> Tour</span>
								<div class="item-content">
									<div class="item-body">
										<div class="col-md-2 col-sm-2 clear-padding text-center">
											<img src="assets/images/offer1.jpg" alt="cruise">
										</div>
										<div class="col-md-7 col-sm-7">
											<h4>Wonderful Europe</h4>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
										</div>
										<div class="col-md-3 col-sm-3">
											<p><a href="#">Remove</a></p>
										</div>
									</div>
									<div class="item-footer">
										<p><strong>Order Total:</strong> $566 <a href="#">Book Now</a></p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="load-more text-center">
								<a href="#">Load More</a>
							</div>
						</div>
					</div>
					<div id="cards" class="tab-pane fade in">
						<div class="col-md-12">
							<div class="col-md-6">
								<div class="card-entry">
									<div class="pull-right">
										<p><a href="#"><i class="fa fa-pencil"></i></a><a href="#"><i class="fa fa-times"></i></a></p>
									</div>
									<h3>XXXX XXXX XXXX 1234</h3>
									<p>Valid Thru 06/17</p>
									<div class="clearfix"></div>
									<div class="card-type">
										<p>Name On Card</p>
										<div class="pull-left">
											<h3>Lenore</h3>
										</div>
										<div class="pull-right">
											<img src="assets/images/card/mastercard.png" alt="cruise">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="card-entry">
									<div class="pull-right">
										<p><a href="#"><i class="fa fa-pencil"></i></a><a href="#"><i class="fa fa-times"></i></a></p>
									</div>
									<h3>XXXX XXXX XXXX 2345</h3>
									<p>Valid Thru 06/17</p>
									<div class="clearfix"></div>
									<div class="card-type">
										<p>Name On Card</p>
										<div class="pull-left">
											<h3>Lenore</h3>
										</div>
										<div class="pull-right">
											<img src="assets/images/card/visa.png" alt="cruise">
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-6">
								<div class="card-entry primary-card">
									<div class="pull-left">
										<span>Primary</span>
									</div>
									<div class="pull-right">
										<p><a href="#"><i class="fa fa-pencil"></i></a><a href="#"><i class="fa fa-times"></i></a></p>
									</div>
									<div class="clearfix"></div>
									<h3>XXXX XXXX XXXX 1234</h3>
									<p>Valid Thru 06/17</p>
									<div class="clearfix"></div>
									<div class="card-type">
										<p>Name On Card</p>
										<div class="pull-left">
											<h3>Lenore</h3>
										</div>
										<div class="pull-right">
											<img src="assets/images/card/mastercard.png" alt="cruise">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="user-add-card">
									<form >
										<input class="form-control" name="card-number" type="text" required placeholder="Card Number">
										<input class="form-control" name="cardholder-name" type="text" required placeholder="Cardholder Name">
										<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
											<input class="form-control" name="valid-month" type="text" required placeholder="Expiry Month">
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input class="form-control" name="valid-year" type="text" required placeholder="Expiry Year">
										</div>
										<div class="clearfix"></div>
										<div class="col-md-4 clear-padding">
											<input class="form-control" name="cvv" type="password" required placeholder="CVV">
										</div>
										<div class="clearfix"></div>
										<div>
											 <button type="submit">ADD CARD</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div id="complaint" class="tab-pane fade in">
						<div class="col-md-12">
							<div class="recent-complaint">
								<h3>Service Requests</h3>
								<div class="complaint-tabs">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#active-complaint" class="text-center"><i class="fa fa-bolt"></i> Active ({{$complaints->count()-$replied}})</a></li>
										<li><a data-toggle="tab" href="#resolved-complaint" class="text-center"><i class="fa fa-history"></i> Resolved ({{$replied}})</a></li>	
									</ul>
								</div>
								<div class="tab-content">
									<div id="active-complaint" class="tab-pane fade in active">					
										@foreach($complaints as $complain)
											<p><a href="#"><span>Ticket #123456:</span> {{$complaint->complaint}}</a></p>
										@endforeach
									</div>
									<div id="resolved-complaint" class="tab-pane fade in">
										@foreach($complaints as $complain)
											@if($complaint->status == 1)
												<p><a href="#"><span>Ticket #123456:</span> {{$complaint->complaint}}</a></p>
											@endif
										@endforeach
									</div>
								</div>
								<h3>New Requests</h3>
								<div class="submit-complaint">
									<form >
										<div class="col-md-6 col-sm-6 col-xs-6">
											<label>Category</label>
											<select class="form-control" name="category">
												<option>Flight</option>
												<option>Hotel</option>
												<option>Cruise</option>
												<option>Holiday</option>
											</select>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<label>Sub Category</label>
											<select class="form-control" name="sub-category">
												<option>Flight</option>
												<option>Hotel</option>
												<option>Cruise</option>
												<option>Holiday</option>
											</select>
										</div>
										<div class="col-md-12">
											<label>Booking ID</label>
											<input type="text" class="form-control" name="booking-id" placeholder="e.g. CR12567">
										</div>
										<div class="col-md-12">
											<label>Subject</label>
											<input type="text" class="form-control" name="subject" placeholder="Problem Subject">
										</div>
										<div class="col-md-12">
											<label>Problem Description</label>
											<textarea class="form-control" rows="5" name="problem" placeholder="Your Issue"></textarea>
										</div>
										<div class="col-md-12 text-center">
											 <button type="submit">SUBMIT REQUEST</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: USER PROFILE -->

@endsection