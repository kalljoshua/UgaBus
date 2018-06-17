@extends('...layouts.user_layout')
@section('title')
    <title>Book Bus Tickets For Your Next Trip</title>
@endsection
@section('content')


	@include('user.menu')

	@include('user.mini-search')

<!-- START: LISTING AREA-->
<div class="row" style="background-color: white;">
	<div class="container">
		
		
		<!-- START: INDIVIDUAL LISTING AREA -->
		<!-- START: INDIVIDUAL LISTING AREA -->
		<div class="col-md-11 hotel-listing">
			
			<!-- START: SORT AREA -->
			<div class="sort-area col-sm-10">
				<!---<div class="col-md-3 col-sm-3 col-xs-6 sort">
					<select class="selectpicker">
						<option>Price</option>
						<option> Low to High</option>
						<option> High to Low</option>
					</select>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 sort">
					<select class="selectpicker">
						<option>Star Rating</option>
						<option> Low to High</option>
						<option> High to Low</option>
					</select>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 sort">
					<select class="selectpicker">
						<option>User Rating</option>
						<option> Low to High</option>
						<option> High to Low</option>
					</select>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 sort">
					<select class="selectpicker">
						<option>Name</option>
						<option> Ascending</option>
						<option> Descending</option>
					</select>
				</div>-->
			</div>
			@if(sizeOf($routes)>0)
			<!-- END: SORT AREA -->
			<div class="clearfix visible-xs-block"></div>
			<div class="col-sm-2 view-switcher">
				<div class="pull-right">
					<a class="switchgrid" title="Grid View">
						<i class="fa fa-th-large"></i>
					</a>
					<a class="switchlist active" title="List View">
						<i class="fa fa-list"></i>
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<!-- START: HOTEL LIST VIEW -->
			<div class="switchable col-md-12 clear-padding">
				@foreach($routes as $route)
				<div  class="hotel-list-view">
					<div class="wrapper">
						<div class="col-md-4 col-sm-6 switch-img clear-padding">
							<img src="/client_inc/assets/images/car10.jpg" alt="cruise">
						</div>
						<div class="col-md-6 col-sm-6 hotel-info">
							<div>
								<div class="hotel-header">
									<h5>{{$route->travel_from}} to {{$route->travel_to}}<span><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star colored"></i><i class="fa fa-star-o colored"></i></span></h5>
									<p><a href="{{route('bus.details',['id' => $route->bus['id']])}}"> {{$route->bus->agent['company']}} </a></p>
								</div>
								<div class="hotel-desc">
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry lorem Ipsum has been.</p>
								</div>
								<div class="car-detail">
									<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
										<p><i class="fa fa-map-marker"></i>{{$route->bus->park['park_name']}}</p>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
										<p><i class="fa fa-info"></i>{{$route->bus->license_plate_number}}</p>
									</div>
									<div class="clearfix"></div>
									<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
										<p><i class="fa fa-clock-o"></i>{{$route->time_of_departure}}</p>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
										<p><i class="fa fa-clock-o"></i>{{$route->estimated_time_of_arrival}}</p>
									</div>
									<div class="clearfix"></div>
									<div class="clearfix"></div>
									<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
										<p><i class="fa fa-users"></i>{{$seats}} Person</p>
									</div>									
									<div class="col-md-6 col-sm-6 col-xs-6 clear-padding">
										<p><i class="fa fa-bus"></i>{{$route->bus->make}} - {{$route->bus->model}}</p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="clearfix visible-sm-block"></div>
						<div class="col-md-2 rating-price-box text-center clear-padding car-item">
							<div class="rating-box">
								<div class="user-rating">
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
									<span>128 Guest Reviews.</span>
								</div>
							</div>
							<div class="room-book-box">
								<div class="price">
									<h5>UGX {{number_format("$route->unit_seat_price")}}/Person</h5>
								</div>
								<div class="book">
									<form action="{{ route('bus.booking') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $route->id }}">
                                        <input type="hidden" name="seats" value="{{ $seats }}">
                                        <input type="hidden" name="price" value="{{ $route->unit_seat_price }}">
                                        <button type="submit" class="btn-sm btn-danger">BOOK</button>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				
				<!-- END: HOTEL LIST VIEW -->
				<div class="clearfix"></div>
			</div>
			@else
				<p>No results found!</p>
			@endif
			<div class="clearfix"></div>
			<!-- START: PAGINATION -->
			<div class="bottom-pagination">
				<nav class="pull-right">
					<ul class="pagination pagination-lg">
						<?php echo $routes->render(); ?>
					</ul>
				</nav>
			</div>
			<!-- END: PAGINATION -->
		</div>
		<!-- END: INDIVIDUAL LISTING AREA -->

		
	</div>
</div>
<!-- END: LISTING AREA -->

@endsection