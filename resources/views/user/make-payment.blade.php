@extends('...layouts.user_layout')
@section('title')
    <title>Book Bus Tickets For Your Next Trip</title>
@endsection
@section('content')

	@include('user.menu')
	<?php 
		if (Session::has('seats') && Session::has('total_price')) {
            $seats = Session::get('seats');
            $total = Session::get('total_price');
            Session::forget('seats');
            Session::forget('total_price');
        }else{
            $seats = 0;
            $total = 0; 
        }

        $cookie_url = Request::url();
		session::put('oldUrl',$cookie_url);
	?>

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
										<label>Mobile Money Number</label>
										<input type="text" name="phonenumber" 
										value="{{Auth::guard('user')->user()->phone}}" class="form-control" required>
										<div class="clearfix"></div>
									</div>
									<br>

									<div class="clearfix"></div>
									<div class="clearfix"></div>

									<h4>Choose payment method</h4>

									<div class="col-md-12">
										@foreach($payment_methods as $payment_method)
										<label data-toggle="collapse" data-target="#saved-card-1">
											<input type="radio" name="getway" value="{{$payment_method->id}}"> <span><img src="/client_inc/assets/images/card/{{$payment_method->image}}" style="width: 54px; height: 30px" alt="cruise"> {{$payment_method->payment_type}}</span></label>
										<div class="clearfix"></div>
										@endforeach
										<div>
											<button type="submit">CONFIRM BOOKING <i class="fa fa-chevron-right"></i></button>
										</div>
									
									</div>
								</form>
								@else
								<a href="" class="transition-effect">
								<a href="{{route('user.login.register')}}" 
								class="transition-effect">
									<i class="fa fa-sign-out"></i>Login to make your booking faster
								</a>
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
										@foreach($payment_methods as $payment_method)
										<label data-toggle="collapse" data-target="#saved-card-1">
											<input type="radio" name="getway" value="{{$payment_method->id}}"> <span>{{$payment_method->payment_type}}</span></label>
										<div class="clearfix"></div>
										@endforeach
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