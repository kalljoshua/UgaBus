@extends('...layouts.user_layout')
@section('title')
    <title>Book Bus Tickets For Your Next Trip</title>
@endsection
@section('content')

	@include('user.menu')

	<!-- START: PAGE TITLE -->
	<div class="row page-title page-title3">
		<div class="container clear-padding text-center">
			<h3>MERCEDES C CLASS</h3>
			<h4>
				<i class="fa fa-certificate"></i>
				MERCEDES
			</h4>
			<p><i class="fa fa-map-marker"></i> Mall Road, Shimla</p>
		</div>
	</div>
	<!-- END: PAGE TITLE -->
	
	<!-- START: CAR GALLERY -->
	<div class="row hotel-detail" style="background-color: white;">
		<div class="container">
			<div class="product-brief-info">
				<div class="col-md-8 clear-padding">
					<div id="slider" class="flexslider">
						<ul class="slides">
							<li>
								<img src="/client_inc/assets/images/car-slide2.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-slide1.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-gallery2.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-gallery.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-gallery1.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-slide2.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-slide1.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-gallery2.jpg" alt="cruise" />
							</li>
						</ul>
					</div>
					<div id="carousel" class="flexslider">
						<ul class="slides">
							<li>
								<img src="/client_inc/assets/images/car-thumb2.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-thumb3.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-thumb4.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-thumb.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-thumb1.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-thumb2.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-thumb3.jpg" alt="cruise" />
							</li>
							<li>
								<img src="/client_inc/assets/images/car-thumb4.jpg" alt="cruise" />
							</li>
						</ul>
					</div>
				</div>	
				<div class="col-md-4 detail clear-padding">
					<h4><i class="fa fa-taxi"></i>Car Details</h4>
					<div class="detail-body">
						<ul>
							<li>Manufacturing Year 2014</li>
							<li>Travelled 12000 KM</li>
							<li>Fuel Type Diesel</li>
							<li>Automatic Transmission</li>
							<li>Fuel Tank Capacity 56 Liter</li>
							<li>Top Speed 125 KMPH</li>
							<li>Engine 1200 cc</li>
							<li>Manufacturing Year 2014</li>
						</ul>
					</div>
					<div class="price-detail">
						<div class="col-md-5 col-sm-6 col-xs-6 clear-padding text-center">
							<h3>$49<span>/Day</span></h3>
						</div>
						<div class="col-md-7 col-sm-6 col-xs-6 clear-padding text-center">
							<a href="{{route('bus.booking')}}"><i class="fa fa-edit"></i>RESERVE NOW</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row product-complete-info" style="background-color: white;">
		<div class="container">
			<div class="main-content col-md-8 clear-padding">
				<div class="room-complete-detail">
					<ul class="nav nav-tabs">
						<li class="active col-md-4 col-sm-4 col-xs-4 text-center"><a data-toggle="tab" href="#overview"><i class="fa fa-bolt"></i> <span>Overview</span></a></li>
						<li class="col-md-4 col-sm-4 col-xs-4 text-center"><a data-toggle="tab" href="#review"><i class="fa fa-comments"></i> <span>Reviews</span></a></li>
						<li class="col-md-4 col-sm-4 col-xs-4 text-center"><a data-toggle="tab" href="#write-review"><i class="fa fa-edit"></i> <span>Write Review</span></a></li>
					</ul> 
					<div class="tab-content">
						<div id="overview" class="tab-pane active in fade">
							<h4 class="tab-heading">Overview</h4>
							<div class="car-overview col-md-2 col-sm-4 col-xs-6"><i class="fa fa-tint"></i>Diesel</div>
							<div class="car-overview col-md-2 col-sm-4 col-xs-6"><i class="fa fa-dashboard"></i>Auto</div>
							<div class="car-overview col-md-2 col-sm-4 col-xs-6"><i class="fa fa-users"></i>4 People</div>
							<div class="car-overview col-md-2 col-sm-4 col-xs-6"><i class="fa fa-taxi"></i>4 Doors</div>
							<div class="car-overview col-md-2 col-sm-4 col-xs-6"><i class="fa fa-suitcase"></i>100 KG</div>
							<div class="car-overview col-md-2 col-sm-4 col-xs-6"><i class="fa fa-eye"></i>Navigation</div>
							<div class="clearfix"></div>
							<div class="rent-box">
								<div class="add-ons col-md-6 col-sm-6">
									<ul>
										<li><input type="checkbox">Child Seat <span class="pull-right">$12/Day</span></li>
										<li><input type="checkbox">Satelite Navigation <span class="pull-right">$49/Day</span></li>
										<li><input type="checkbox">Music System <span class="pull-right">$99/Day</span></li>
										<li><input type="checkbox">Child Seat <span class="pull-right">$12/Day</span></li>
										<li><input type="checkbox">Satelite Navigation <span class="pull-right">$49/Day</span></li>
									</ul>
								</div>
								<div class="rent-detail col-md-6 col-sm-6">
									<ul>
										<li>Daily Rent <span class="pull-right">$99</span></li>
										<li>Rental Price <span class="pull-right">$495</span></li>
										<li class="duration-sm"><i>5 (Days 21 - Aug 25 Aug)</i></li>
										<li>Add Ons <span class="pull-right">$55</span></li>
										<li class="rental-total">Grand Total<span class="pull-right">$550</span></li>
									</ul>
								</div>
								<div class="clearfix"></div>
								<div class="reserve-car text-center">
									<a href="#">RESERVE NOW</a>
								</div>
							</div>
							<div class="clearfix"></div>
							<h4 class="tab-heading">Brief Description of Car</h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
							<h4 class="tab-heading">Car Features</h4>
							<ul class="check-list">
								<li class="col-md-5 col-sm-5">GPS Navigation</li>
								<li class="col-md-5 col-sm-5">Automatic Transmission</li>
								<li class="col-md-5 col-sm-5">FM Radio</li>
								<li class="col-md-5 col-sm-5">4 Doors & Panorama View</li>
								<li class="col-md-5 col-sm-5">Hi FI Sound System</li>
								<li class="col-md-5 col-sm-5">Mileage 12KM/Liter</li>
								<li class="col-md-5 col-sm-5">Mileage 12KM/Liter</li>
								<li class="col-md-5 col-sm-5">4 Doors & Panorama View</li>
								<li class="col-md-5 col-sm-5">Hi FI Sound System</li>
								<li class="col-md-5 col-sm-5">GPS Navigation</li>
								<li class="col-md-5 col-sm-5">Automatic Transmission</li>
								<li class="col-md-5 col-sm-5">FM Radio</li>
							</ul>
						</div>
						<div id="review" class="tab-pane fade">
							<h4 class="tab-heading">Car Reviews</h4>
							<div class="review-header">
								<div class="col-md-6 col-sm6 text-center">
									<h2>4.0/5.0</h2>
									<h5>Based on 128 Reviews</h5>
								</div>
								<div class="col-md-6 col-sm-6">
									<table class="table">
										<tr>
											<td>Value for Money</td>
											<td>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</td>
										</tr>
										<tr>
											<td>Atmosphere in hotel</td>
											<td>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</td>
										</tr>
										<tr>
											<td>Quality of food</td>
											<td>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</td>
										</tr>
										<tr>
											<td>Staff behaviour</td>
											<td>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</td>
										</tr>
										<tr>
											<td>Restaurant Quality</td>
											<td>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</td>
										</tr>
									</table>
								</div>
								<div class="clearfix"></div>
								<div class="guest-review">
									<div class="individual-review dark-review">
										<h4>Best Place to Stay, Awesome <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
										<div class="col-md-md-1 col-sm-1 col-xs-2">
											<img src="/client_inc/assets/images/user1.jpg" alt="cruise">
										</div>
										<div class="col-md-md-3 col-sm-3 col-xs-3">
											<span>Lenore, USA</span>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="individual-review">
										<h4>Best Place to Stay, Awesome <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
										<div class="col-md-md-1 col-sm-1 col-xs-2">
											<img src="/client_inc/assets/images/user.jpg" alt="cruise">
										</div>
										<div class="col-md-md-3 col-sm-3 col-xs-3">
											<span>Lenore, USA</span>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="individual-review dark-review">
										<h4>Best Place to Stay, Awesome <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
										<div class="col-md-md-1 col-sm-1 col-xs-2">
											<img src="/client_inc/assets/images/user1.jpg" alt="cruise">
										</div>
										<div class="col-md-md-3 col-sm-3 col-xs-3">
											<span>Lenore, USA</span>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="individual-review">
										<h4>Best Place to Stay, Awesome <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
										<div class="col-md-md-1 col-sm-1 col-xs-2">
											<img src="/client_inc/assets/images/user.jpg" alt="cruise">
										</div>
										<div class="col-md-md-3 col-sm-3 col-xs-3">
											<span>Lenore, USA</span>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="individual-review dark-review">
										<h4>Best Place to Stay, Awesome <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h4>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
										<div class="col-md-md-1 col-sm-1 col-xs-2">
											<img src="/client_inc/assets/images/user1.jpg" alt="cruise">
										</div>
										<div class="col-md-md-3 col-sm-3 col-xs-3">
											<span>Lenore, USA</span>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="load-more text-center">
										<a href="#">Load More</a>
									</div>
								</div>
							</div>
						</div>
						<div id="write-review" class="tab-pane fade">
							<h4 class="tab-heading">Write A Review</h4>
							<form >
								<label>Review Title</label>
								<input type="text" class="form-control" name="review-titile" required>
								<label for="comment">Comment</label>
								<textarea class="form-control" rows="5" id="comment"></textarea>
								<label>Value for Money (Rate out of 5)</label>
								<input type="text" class="form-control" name="value-for-money">
								<label>Hotel Atmosphere (Rate out of 5)</label>
								<input type="text" class="form-control" name="atmosphere">
								<label>Staff Behaviour (Rate out of 5)</label>
								<input type="text" class="form-control" name="staff-beh">
								<label>Food Quality (Rate out of 5)</label>
								<input type="text" class="form-control" name="food-quality">
								<label>Rooms (Rate out of 5)</label>
								<input type="text" class="form-control" name="room">
								<div class="text-center">
									<button type="submit" class="btn btn-default submit-review">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 hotel-detail-sidebar clear-padding">
				<div class="col-md-12 sidebar-wrapper clear-padding">
					<div class="contact sidebar-item">
						<h4><i class="fa fa-phone"></i> Contact Agent</h4>
						<div class="sidebar-item-body">
							<h5><i class="fa fa-phone"></i> +91 1234567890</h5>
							<h5><i class="fa fa-envelope-o"></i> <a href="mailto:your@domainname.com">Send Email</a></h5>
							<h5><i class="fa fa-map-marker"></i> Mall Road, Shimla, Himachal Pradesh, 176077</h5>
						</div>
					</div>
					<div class="review sidebar-item">
						<h4><i class="fa fa-edit"></i> Car Reviews</h4>
						<div class="sidebar-item-body text-center">
							<div class="rating-box">
								<div class="col-md-6 col-sm-6 col-xs-6 clear-padding tripadvisor">
									<img src="/client_inc/assets/images/tripadvisor.png" alt="cruise"><br>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
									<h5>4.0/5.0 Based on 12 Reviews</h5>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
									<i class="fa fa-users"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
									<h5>Based on 128 Guest Reviews</h5>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="guest-say rating-box">
								<h2><i class="fa fa-check-circle"></i> Perfect</h2>
								<div>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>	
								</div>
								<div class="col-md-5 col-sm-5 col-xs-5 clear-padding user-img">
									<img src="/client_inc/assets/images/user1.jpg" alt="cruise">
								</div>
								<div class="col-md-7 col-sm-7 col-xs-7 clear-padding user-name">
									<span>Lenore, USA</span>
									<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- END: ROOM GALLERY -->

@endsection