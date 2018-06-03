
	<div class="row transparent-menu-top">
		<div class="container clear-padding">
			<div class="navbar-contact">
				<div class="col-md-7 col-sm-6 clear-padding">
					<a href="#" class="transition-effect">
						<i class="fa fa-phone"></i> (+256) 704741443</a>
					<a href="#" class="transition-effect">
						<i class="fa fa-envelope-o"></i> support@email.com</a>
				</div>
				<div class="col-md-5 col-sm-6 clear-padding search-box">
					<div class="col-md-6 col-xs-5 clear-padding">
						<form >
							<div class="input-group">
								<button type="button" class="btn btn-danger">
								Download App
								</button>
							</div>
						</form>
					</div>
					<div class="col-md-6 col-xs-7 clear-padding user-logged">
					@if(Auth::guard('user')->user())
						<a href="#" class="transition-effect">
							<img src="/client_inc/assets/images/user.jpg" alt="cruise">
							Hi, {{Auth::guard('user')->user()->name}}
						</a>
						<a href="{{route('user.logout')}}" class="transition-effect">
							<i class="fa fa-sign-out"></i>Sign Out
						</a>
					@else
						<a href="{{route('user.login.register')}}" 
						class="transition-effect">
							<i class="fa fa-sign-out"></i>Signin
						</a>
					@endif
						
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="clearfix"></div>