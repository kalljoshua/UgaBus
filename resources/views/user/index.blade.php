@extends('...layouts.user_layout')
@section('title')
    <title>Book Bus Tickets For Your Next Trip</title>
@endsection
@section('content')

    
    @include('user.menu')

	<!-- BEGIN: SEARCH SECTION -->
	<div class="row vertical-search">
		<div class="container clear-padding">
			<div class="search-section">
				<div role="tabpanel">
					<div class="col-md-1 col-sm-1 vertical-tab">
						
					</div>
					<div class="col-md-10 col-sm-10 vertical-tab-pannel">
						<!-- BEGIN: TAB PANELS -->
						<div class="tab-content">							
								
								<!-- START: CAR SEARCH -->
								<div role="tabpanel" class="tab-pane active" id="taxi">
									<div class="col-md-8">
										<form method="get" action="{{route('search')}}">
											<div class="col-md-12 product-search-title">Search Perfect Car</div>
											<div class="col-md-6 col-sm-6 search-col-padding">
												<label>Pick Up Location</label>
												<div class="input-group">
													<input type="text" name="departure-city" class="form-control" required placeholder="E.g. New York">
													<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 search-col-padding">
												<label>Drop Off Location</label>
												<div class="input-group">
													<input type="text" name="destination-city" class="form-control" required placeholder="E.g. New York">
													<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="col-md-6 col-sm-6 search-col-padding">
												<label>Pick Up Date</label>
												<div class="input-group">
													<input type="text" id="car_start" class="form-control" placeholder="MM/DD/YYYY">
													<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 search-col-padding">
												<label>Drop Off Date</label>
												<div class="input-group">
													<input type="text" id="car_end" class="form-control" placeholder="MM/DD/YYYY">
													<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="col-md-6 col-sm-6 search-col-padding">
												<label>Car Brnad(Optional)</label><br>
												<select class="selectpicker" name="brand">
													<option>BMW</option>
													<option>Audi</option>
													<option>Mercedes</option>
													<option>Suzuki</option>
													<option>Honda</option>
													<option>Hyundai</option>
													<option>Toyota</option>
												</select>
											</div>
											<div class="col-md-6 col-sm-6 search-col-padding">
												<label>Car Type(Optional)</label><br>
												<select class="selectpicker" name="car_type">
													<option>Limo</option>
													<option>Sedan</option>
												</select>
											</div>
											<div class="clearfix"></div>
											<div class="col-md-12 search-col-padding">
												<button type="submit" class="search-button btn transition-effect">Search Cars</button>
											</div>
											<div class="clearfix"></div>
										</form>
									</div>
									<div class="offer-box col-md-4">
										<div class="item">
											<img src="/client_inc/assets/images/car11.jpg" alt="cruise">
											<h4>BMW</h4>
											<h5>Starting From $399/Day</h5>
											<a href="#">KNOW MORE</a>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<!-- END: CAR SEARCH -->								
								
						</div>
						<!-- END: TAB PANE -->
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- END: SEARCH SECTION -->

<!-- BEGIN: HOW IT WORK -->
<section id="how-it-work">
		<div class="row work-row">
			<div class="container">
				<div class="section-title text-center">
					<h2>HOW IT WORKS?</h2>
					<h4>SEARCH - SELECT - BOOK</h4>
					<div class="space"></div>
					<p>
						Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
						Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
					</p>
				</div>
				<div class="work-step">
					<div class="col-md-4 col-sm-4 first-step text-center">
						<i class="fa fa-search"></i>
						<h5>SEARCH</h5>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					</div>
					<div class="col-md-4 col-sm-4 second-step text-center">
						<i class="fa fa-heart-o"></i>
						<h5>SELECT</h5>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					</div>
					<div class="col-md-4 col-sm-4 third-step text-center">
						<i class="fa fa-shopping-cart"></i>
						<h5>BOOK</h5>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					</div>
				</div>
			</div>
		</div>
</section>
<!--END: HOW IT WORK -->

<!-- START: HOT  DEALS -->
<section>
	<div class="row hot-deals">
		<div class="container clear-padding">
			<div class="section-title text-center">
				<h2>Recommended Routes</h2>
				<h4>SAVE MORE</h4>
			</div>
			<div role="tabpanel" class="text-center">
				<!-- END: CATEGORY TAB -->
				<div class="clearfix"></div>
				<!-- BEGIN: TAB PANELS -->
				<div class="tab-content">
					<!-- BEGIN: FLIGHT SEARCH -->
					<div role="tabpanel" class="tab-pane active fade in" id="tab1">
						<div class="col-md-6 hot-deal-list wow slideInLeft">
							@foreach($routes as $route)
							<div class="item">
								<div class="col-xs-3">
									<img src="/client_inc/assets/images/offer1.jpg" alt="Cruise">
								</div>
								<div class="col-md-7 col-xs-6">
									<h5>{{$route->bus['busname']}}</h5>
									<p class="location">
										<i class="fa fa-map-marker"></i> {{$route->travelfrom}} to {{$route->travelto}}</p>
									<p class="text-sm">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
								<div class="col-md-2 col-xs-3">
									<h4>UGX {{number_format("$route->price_total")}}</h4>
									<h6>Per seat</h6>
									<a href="{{route('bus.booking')}}">BOOK</a>
								</div>
							</div>
							<div class="clearfix"></div>
							@endforeach
						</div>
						<div class="col-md-6 hot-deal-grid wow slideInRight">
							<div class="col-sm-6 item">
								<div class="wrapper">
									<img src="/client_inc/assets/images/tour1.jpg" alt="Cruise">
									<h5>Paris Starting From $49/Night</h5>
									<a href="#">DETAILS</a>
								</div>
							</div>
							<div class="col-sm-6 item">
								<div class="wrapper">
									<img src="/client_inc/assets/images/tour2.jpg" alt="Cruise">
									<h5>Bangkok Starting From $69/Night</h5>
									<a href="#">DETAILS</a>
								</div>
							</div>
							<div class="col-sm-6 item">
								<div class="wrapper">
									<img src="/client_inc/assets/images/tour3.jpg" alt="Cruise">
									<h5>Dubai Starting From $99/Night</h5>
									<a href="#">DETAILS</a>
								</div>
							</div>
							<div class="col-sm-6 item">
								<div class="wrapper">
									<img src="/client_inc/assets/images/tour4.jpg" alt="Cruise">
									<h5>Italy Starting From $59/Night</h5>
									<a href="#">DETAILS</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: HOT DEALS -->



<!-- BEGIN: RECENT BLOG POST -->
<section id="recent-blog">
	<div class="row top-offer">
		<div class="container">
			<div class="section-title text-center">
				<h2>RECENT BLOG POSTS</h2>
				<h4>NEWS</h4>
			</div>
			<div class="owl-carousel" id="post-list">
				<div class="room-grid-view wow slideInUp" data-wow-delay="0.1s">
					<img src="/client_inc/assets/images/offer1.jpg" alt="cruise">
					<div class="room-info">
						<div class="post-title">
							<h5>POST TITLE GOES HERE</h5>
							<p><i class="fa fa-calendar"></i> Jul 15, 2015</p>
						</div>
						<div class="post-desc">
							<p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
						<div class="room-book">
							<div class="col-md-8 col-sm-6 col-xs-6 clear-padding post-alt">
								<h5><i class="fa fa-comments"></i> 2 <i class="fa fa-share-alt"></i> 20 </h5>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 clear-padding">
								<a href="#" class="text-center">MORE</a> 
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="room-grid-view wow slideInUp" data-wow-delay="0.2s">
					<img src="/client_inc/assets/images/offer2.jpg" alt="cruise">
					<div class="room-info">
						<div class="post-title">
							<h5>POST TITLE GOES HERE</h5>
							<p><i class="fa fa-calendar"></i> Jul 15, 2015</p>
						</div>
						<div class="post-desc">
							<p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
						<div class="room-book">
							<div class="col-md-8 col-sm-6 col-xs-6 clear-padding post-alt">
								<h5><i class="fa fa-comments"></i> 2 <i class="fa fa-share-alt"></i> 20 </h5>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 clear-padding">
								<a href="#" class="text-center">MORE</a> 
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="room-grid-view wow slideInUp" data-wow-delay="0.3s">
					<img src="/client_inc/assets/images/offer3.jpg" alt="cruise">
					<div class="room-info">
						<div class="post-title">
							<h5>POST TITLE GOES HERE</h5>
							<p><i class="fa fa-calendar"></i> Jul 15, 2015</p>
						</div>
						<div class="post-desc">
							<p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
						<div class="room-book">
							<div class="col-md-8 col-sm-6 col-xs-6 clear-padding post-alt">
								<h5><i class="fa fa-comments"></i> 2 <i class="fa fa-share-alt"></i> 20 </h5>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 clear-padding">
								<a href="#" class="text-center">MORE</a> 
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="room-grid-view wow slideInUp" data-wow-delay="0.4s">
					<img src="/client_inc/assets/images/offer4.jpg" alt="cruise">
					<div class="room-info">
						<div class="post-title">
							<h5>POST TITLE GOES HERE</h5>
							<p><i class="fa fa-calendar"></i> Jul 15, 2015</p>
						</div>
						<div class="post-desc">
							<p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
						<div class="room-book">
							<div class="col-md-8 col-sm-6 col-xs-6 clear-padding post-alt">
								<h5><i class="fa fa-comments"></i> 2 <i class="fa fa-share-alt"></i> 20 </h5>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 clear-padding">
								<a href="#" class="text-center">MORE</a> 
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="room-grid-view wow slideInUp" data-wow-delay="0.5s">
					<img src="/client_inc/assets/images/offer3.jpg" alt="cruise">
					<div class="room-info">
						<div class="post-title">
							<h5>POST TITLE GOES HERE</h5>
							<p><i class="fa fa-calendar"></i> Jul 15, 2015</p>
						</div>
						<div class="post-desc">
							<p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
						<div class="room-book">
							<div class="col-md-8 col-sm-6 col-xs-6 clear-padding post-alt">
								<h5><i class="fa fa-comments"></i> 2 <i class="fa fa-share-alt"></i> 20 </h5>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 clear-padding">
								<a href="#" class="text-center">MORE</a> 
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="room-grid-view wow slideInUp" data-wow-delay="0.6s">
					<img src="/client_inc/assets/images/offer2.jpg" alt="cruise">
					<div class="room-info">
						<div class="post-title">
							<h5>POST TITLE GOES HERE</h5>
							<p><i class="fa fa-calendar"></i> Jul 15, 2015</p>
						</div>
						<div class="post-desc">
							<p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
						<div class="room-book">
							<div class="col-md-8 col-sm-6 col-xs-6 clear-padding post-alt">
								<h5><i class="fa fa-comments"></i> 2 <i class="fa fa-share-alt"></i> 20 </h5>
							</div>
							<div class="col-md-4 col-sm-6 col-xs-6 clear-padding">
								<a href="#" class="text-center">MORE</a> 
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: RECENT BLOG POST -->

<!-- START: WHY CHOOSE US SECTION -->
<section id="why-choose-us">
	<div class="row choose-us-row">
		<div class="container clear-padding">
			<div class="light-section-title text-center">
				<h2>WHY CHOOSE US?</h2>
				<h4>REASONS TO TRUST US</h4>
				<div class="space"></div>
				<p>
					Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>
					Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
				</p>
			</div>
			<div class="col-md-4 col-sm-4 wow slideInLeft">
				<div class="choose-us-item text-center">
					<div class="choose-icon"><i class="fa fa-suitcase"></i></div>
					<h4>Handpicked Tour</h4>
					<p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					<a href="#">KNOW MORE</a>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 wow slideInUp">
				<div class="choose-us-item text-center">
					<div class="choose-icon"><i class="fa fa-phone"></i></div>
					<h4>Dedicated Support</h4>
					<p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					<a href="#">KNOW MORE</a>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 wow slideInRight">
				<div class="choose-us-item text-center">
					<div class="choose-icon"><i class="fa fa-smile-o"></i></div>
					<h4>Lowest Price</h4>
					<p>Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					<a href="#">KNOW MORE</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END: WHY CHOOSE US SECTION -->



@endsection