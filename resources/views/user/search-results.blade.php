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
		<div class="col-md-12 flight-listing">
			
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
			<!-- START: HOTEL LIST VIEW -->
			<div class="flight-listing col-md-12 clear-padding">
				@foreach($routes as $route)
				<div class="flight-list-view">
					<div class="airline-logo col-md-2 text-center clear-padding">
						<img src="assets/images/airline/vistara-2x.png" alt="cruise">
						<h6>{{$route->bus->company->company_name}}</h6>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-8 text-center clear-padding flight-desc">
						<div class="take-off">
							<h4><i class="fa fa-clock-o"></i> Depature Time: {{$route->time_of_departure}}</h4> 
							<h5><i class="fa fa-map-marker"></i> {{$route->bus->company->hq_address}}, {{$route->travel_from}}</h5>
						</div>
						<div class="landing">
							<h4><i class="fa fa-clock-o fa-rotate-45"></i> Estimated Rival: {{$route->estimated_time_of_arrival}}</h4> 
							<h5><i class="fa fa-map-marker"></i> {{$route->travel_to}}</h5>
						</div>
					</div>
					<div class="col-md-2 col-sm-6 col-xs-4 flight-desc text-center">
						<div class="duration">
							<h5><i class="fa fa-user"></i> {{$seats}} Seat(s)</h5>
							<h5>NUMBER PLATE:</h5>
							<h5>{{$route->bus->license_plate_number}}</h5>
						</div>
					</div>
					<div class="clearfix visible-sm-block visible-xs-block"></div>
					<div class="col-md-2 flight-book text-center clear-padding">
						<div class="price">
							<h4 style="color: #f9676b;">UGX {{number_format($route->unit_seat_price)}}</h4>
							<h5>Per Person</h5>
						</div>
						<div class="book">
							<form action="{{ route('bus.booking') }}" method="POST">
	                            {{ csrf_field() }}
	                            <input type="hidden" name="id" value="{{ $route->id }}">
	                            <input type="hidden" name="seats" value="{{ $seats }}">
	                            <input type="hidden" name="price" value="{{ $route->unit_seat_price }}">
							<div class="form-gp">
								<button type="submit" class="btn btn-warning transition-effect">BOOK NOW</button>
							</div>
							</form>
						</div>
					</div>					
					<div class="clearfix"></div>
					<div class="flight-list-footer">
						<div class="col-md-6 col-sm-6 col-xs-6 sm-invisible">
							<span><i class="fa fa-bus"></i> {{$route->bus->company->company_name}}</span>
							<span class="refund" data-toggle="modal" data-target="#reviewModal"><i class="fa fa-comment"></i> Reviews</span>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-10 clear-padding">
							<div class="pull-right">
								Rating: 
							<i class="tour-price-single animated growIn slower"style="color: #FDC600; font-size: 15px">
								@for ($k=1; $k <= 5 ; $k++)
									<i data-title="Average Rate: 5 / 5" class="bottom-ratings tip">    
										<i class="glyphicon glyphicon-star{{ ($k <= $route->rating) ? '' : '-empty'}}" style="font-size: 15px">											
										</i>
									</i>
								@endfor
	                            ({{$route->rating}})
	                        </i>
	                    </div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
							    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							    <h4 class="modal-title" id="myModalLabel">Route Reviews</h4>
							</div>
							<div class="modal-body">
							    @foreach($route->bookings as $booking)
							    	@foreach(App\Review::where('booking_id',$booking->id)->get() as $review)
							    	<div class="comment-box">
										<div class="comment-wrapper">
											<div class="col-md-2 col-sm-2 col-xs-2">
												<img src="assets/images/user.jpg" alt="cruise">
											</div>
											<div class="col-md-10 col-sm-10 col-xs-10">
												<div class="comment-body">
													<h4>{{$review->user->last_name}}</h4>
													<span><i class="fa fa-clock-o">{{$review->created_at->diffForHumans()}}</i></span>
													<p>{{$review->review_message}}</p>
													<h5>
														<i class="tour-price-single animated growIn slower"style="color: #FDC600; font-size: 15px">
															@for ($k=1; $k <= 5 ; $k++)
																<i data-title="Average Rate: 5 / 5" class="bottom-ratings tip">    
																	<i class="glyphicon glyphicon-star{{ ($k <= $review->rating) ? '' : '-empty'}}" style="font-size: 15px">											
																	</i>
																</i>
															@endfor
								                        </i>
													</h5>
												</div>
											</div>
										</div>
									</div>
							    		<p></p>
							    	@endforeach
							    @endforeach
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