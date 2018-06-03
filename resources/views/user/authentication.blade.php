@extends('...layouts.user_layout')
@section('title')
    <title>Book Bus Tickets For Your Next Trip</title>
@endsection
@section('content')

	@include('user.menu')

	<!-- START: PAGE TITLE -->
	<div class="row page-title">
		<div class="container clear-padding text-center flight-title">
			<h3>LOGIN/REGISTER</h3>
			<h4 class="thank">Manage Your Account</h4>
		</div>
	</div>
    <!-- END: PAGE TITLE -->
    
    <!-- START: LOGIN/REGISTER -->
	<div class="row login-row" style="background-color:white;">
		<div class="container clear-padding">
			<div class="col-sm-2 useful-links">
				<h4>Useful Links</h4>
				<a href="#">Become A Partner</a>
				<a href="#">Career</a>
				<a href="#">Developers</a>
				<a href="#">FAQ</a>
				<a href="#">Partners</a>
				<a href="#">Terms Of Use</a>
				<a href="#">Privacy Policy</a>
			</div>
			<div class="col-sm-5 login-form">
				<h4>Login</h4>
				<form action="{{route('user.login.submit')}}" method="post">
                    {{ csrf_field() }}
					<label>Email</label>
					<div class="input-group">
						<input name="email" type="email" 
						class="form-control" placeholder="Email" required>
						<span class="input-group-addon">
							<i class="fa fa-envelope-o fa-fw"></i></span>
					</div>
					<label>Password</label>
					<div class="input-group">
						<input name="password" type="password" 
						class="form-control" placeholder="Password" required>
						<span class="input-group-addon">
							<i class="fa fa-eye fa-fw"></i></span>
					</div>					
					<button type="submit">LOGIN <i class="fa fa-sign-in"></i></button>
				</form>
			</div>
			<div class="col-sm-5 sign-up-form">
				<h4>Sign Up</h4>
				<form action="{{route('user.submit')}}" 
						method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
					<label>Firstname</label>
					<div class="input-group">
						<input name="fname" type="text" class="form-control" 
						placeholder="Full Name" required>
						<span class="input-group-addon">
							<i class="fa fa-user fa-fw"></i></span>
					</div>
					<label>Lastname</label>
					<div class="input-group">
						<input name="lname" type="text" class="form-control" 
						placeholder="Full Name" required>
						<span class="input-group-addon">
							<i class="fa fa-user fa-fw"></i></span>
					</div>
					<label>Email</label>
					<div class="input-group">
						<input name="email" type="email" class="form-control" 
						placeholder="Email" required>
						<span class="input-group-addon">
							<i class="fa fa-envelope-o fa-fw"></i></span>
					</div>
					<label>Phone</label>
					<div class="input-group">
						<input name="phone" type="text" class="form-control" 
						placeholder="phone" required>
						<span class="input-group-addon">
							<i class="fa fa-phone fa-fw"></i></span>
					</div>
					<label>Password</label>
					<div class="input-group">
						<input name="password" type="password" 
						class="form-control" placeholder="Password" required>
						<span class="input-group-addon">
							<i class="fa fa-eye fa-fw"></i></span>
					</div>	
					<label>Confirm Password</label>
					<div class="input-group">
						<input name="pass" type="password" 
						class="form-control" placeholder="Retype Password">
						<span class="input-group-addon">
							<i class="fa fa-eye fa-fw"></i></span>
					</div>	
					<input name="tc" type="checkbox"> I agree To Terms & Conditions
					<button type="submit">REGISTER ME <i class="fa fa-edit"></i></button>
				</form>
			</div>
		</div>
	</div>
	<!-- END: LOGIN/REGISTER -->
@endsection