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
						<li><a data-toggle="tab" href="#wishlist"
						 class="text-center"><i class="fa fa-bus"></i> 
						 <span>My Buses</span></a></li>						
						<li><a data-toggle="tab" href="#complaint" 
						class="text-center"><i class="fa fa-edit"></i> 
						<span>Complaints</span></a></li>
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
									<h5><i class="fa fa-briefcase"></i>{{$user->company}}</h5>
								</div>
								<div class="clearfix"></div>
								<div class="brief-info-footer">
									<a data-toggle="tab" href="#profile"><i class="fa fa-edit"></i>Edit Profile</a>
									<a href="#"><i class="fa fa-plus"></i>Add Travel Preference</a>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="most-recent-booking">
								<h4>Recent Travels</h4>
								@foreach($user->buses as $bus)
									@foreach($bus->routes as $route)
										@foreach(App\Booking::where('route_id',$route->id)->get() as $booking)
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
									@endforeach
								@endforeach
							</div>
						</div>
						<div class="col-md-6">
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
							<div class="user-notification">
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
							@foreach($user->buses as $bus)
								@foreach($bus->routes as $route)
									@foreach(App\Booking::where('route_id',$route->id)->get() as $booking)
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
														<p><a href="#" class="btn-info">Review <i class="fa fa-reply"></i></a></p>
													</div>
												</div>
												<div class="item-footer">
													<p><strong>Travel Date:</strong> {{$booking->created_at}}<strong>Order Total:</strong> UGx {{number_format($booking->route->unit_seat_price)}}</p>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									@endforeach
								@endforeach
							@endforeach	

							<div class="text-center load-more">
								<a href="#">LOAD MORE</a>
							</div>
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
											<input type="text" name="fname" value="{{Auth::guard('agent')->user()->first_name}}" class="form-control" readonly="true">
										</div>
										<div class="col-md-6 col-sm-6">
											<label>First Name</label>
											<input type="text" name="lname" value="{{Auth::guard('agent')->user()->last_name}}" class="form-control" readonly="true">
										</div>
										<div class="clearfix"></div>
										<div class="col-md-12">
											<label>Email-ID</label>
											<input type="email" name="email" value="{{Auth::guard('agent')->user()->email}}" class="form-control" readonly="true">
										</div>
										<div class="col-md-12">
											<label>Contact Number</label>
											<input type="text" name="contact" value="{{Auth::guard('agent')->user()->phone}}" class="form-control" readonly="true">
										</div>	
										<div class="col-md-12">
											<label>Company</label>
											<input type="text" name="company" value="{{Auth::guard('agent')->user()->company}}" class="form-control" readonly="true">
										</div>	
										<div class="col-md-12">
											<label>Address</label>
											<input type="text" name="address" value="{{Auth::guard('agent')->user()->agent_address}}" class="form-control" readonly="true">
										</div>
										<div class="col-md-12">
											<label>Birth Date</label>
											<input type="text" name="date_of_birth" value="{{Auth::guard('agent')->user()->date_of_birth}}" class="form-control" readonly="true">
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
							@foreach($user->buses as $bus)
							<div class="item-entry">
							<span><i class="fa fa-bus"></i> {{$bus->agent['company']}}</span>
								<div class="item-content">									
										<div class="item-body">
											<div class="col-xs-3">
												<img src="/client_inc/assets/images/offer1.jpg" alt="Cruise">
											</div>
											<div class="col-md-7 col-xs-6">
												<h5><i class="fa fa-bus"></i> {{$bus->agent['company']}}</h5>
												<p class="location">
													<i class="fa fa-map-marker"></i> {{$bus->company->hq_address}}</p>
												<p class="text-sm">

											<div class="car-detail">
												<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
													<p><i class="fa fa-tag"></i>{{$bus->license_plate_number}}</p>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
													<p><i class="fa fa-setting"></i>{{$bus->primary_color}} and {{$bus->secondary_color}}</p>
												</div>
												<div class="clearfix"></div>
												<div class="col-md-12 col-sm-12 col-xs-12 clear-padding">
													<p><i class="fa fa-bus"></i>{{$bus->make}} - {{$bus->model}}</p>
												</div>									
												<div class="clearfix"></div>
											</div>
												</p>
											</div>
											<div class="col-md-2 col-xs-3">	
												<h4 class="text-center">{{$bus->routes->count()}}</h4>				
												<h4 class="text-center">Routes</h4>					
											</div>
										</div>
										<div class="clearfix"></div>
									
								</div>
							</div>
							@endforeach							
							
							<div class="load-more text-center">
								<a href="#">Load More</a>
							</div>
						</div>
					</div>					
					<div id="complaint" class="tab-pane fade in">
						<div class="col-md-12">
							<div class="recent-complaint">
								<h3>Service Requests</h3>
								<div class="complaint-tabs">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#active-complaint" class="text-center"><i class="fa fa-bolt"></i> Active (6)</a></li>
										<li><a data-toggle="tab" href="#resolved-complaint" class="text-center"><i class="fa fa-history"></i> Resolved (4)</a></li>	
									</ul>
								</div>
								<div class="tab-content">
									<div id="active-complaint" class="tab-pane fade in active">
										<p><a href="#"><span>Ticket #123456:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
										<p><a href="#"><span>Ticket #113443:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
										<p><a href="#"><span>Ticket #113443:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
										<p><a href="#"><span>Ticket #123456:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
										<p><a href="#"><span>Ticket #113443:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
										<p><a href="#"><span>Ticket #113443:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
									</div>
									<div id="resolved-complaint" class="tab-pane fade in">
										<p><a href="#"><span>Ticket #123456:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
										<p><a href="#"><span>Ticket #113443:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
										<p><a href="#"><span>Ticket #113443:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
										<p><a href="#"><span>Ticket #123456:</span> My last booking was failed but ammount has been dedicted from my account.</a></p>
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