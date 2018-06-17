
	<div class="row transparent-menu-top">
		<div class="container clear-padding">
			<div class="navbar-contact">
				<div class="col-md-4 col-sm-5 clear-padding">
					<a href="#" class="transition-effect">
						<i class="fa fa-phone"></i> (+256) 704741443</a>
					<a href="#" class="transition-effect">
						<i class="fa fa-envelope-o"></i> support@email.com</a>
				</div>
				<div class="col-md-8 col-sm-7 clear-padding search-box">
					<div class="col-md-12 col-xs-12 clear-padding user-logged">
					@if(Auth::guard('user')->user())
						<a href="{{route('user.account',['name'=>Auth::guard('user')->user()->last_name])}}" class="transition-effect">
							<img src="/client_inc/assets/images/user.jpg" alt="cruise">
							Hi, {{Auth::guard('user')->user()->last_name}}
						</a>
						<a href="{{route('user.logout')}}" class="transition-effect">
							<i class="fa fa-sign-out"></i>Sign Out
						</a>
					@elseif(Auth::guard('agent')->user())
						<a href="{{route('agent.account',['name'=>Auth::guard('agent')->user()->last_name])}}" class="transition-effect">
							<img src="/client_inc/assets/images/user.jpg" alt="cruise">
							Hi, {{Auth::guard('agent')->user()->last_name}}
						</a>
						<a href="{{route('user.logout')}}" class="transition-effect">
							<i class="fa fa-sign-out"></i>Sign Out
						</a>
					@else
					<a href="" class="transition-effect">
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