<!-- START: FOOTER -->
<section id="footer">
	<footer>
		<div class="row main-footer-sub">
			<div class="container clear-padding">
				<div class="col-md-7 col-sm-7">
					<form method='post' action="{{route('newsletter.subscribe')}}">
						{{ csrf_field() }}
						<label>SUBSCRIBE TO OUR NEWSLETTER</label>
						<div class="clearfix"></div>
						<div class="col-md-9 col-sm-8 col-xs-6 clear-padding">
							<input class="form-control" type="email" required placeholder="Enter Your Email" name="email">
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6 clear-padding">
							<button type="submit"><i class="fa fa-paper-plane"></i>SUBSCRIBE</button>
						</div>
					</form>
				</div>
				<div class="col-md-5 col-sm-5">
					<div class="social-media pull-right">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="main-footer row">
			<div class="container clear-padding">
				<div class="col-md-3 col-sm-6 links">
					<h4>Usefull Links</h4>
					<ul>
						<li><a href="/">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">How it works</a></li>
						<li><a href="#">FAQ</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Our Services</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 links">
					<h4>Popular Routes</h4>
					<ul>
						@foreach($route_id as $routes)
							<?php 
							$route = App\Route::find($routes)->first();
							?><li><a href="#">{{$route['travel_from']}} <i class="fa fa-arrow-right"></i> {{$route['travel_to']}}</a></li> 
						@endforeach
					</ul>
				</div>
				<div class="clearfix visible-sm-block"></div>
				<div class="col-md-3 col-sm-6 links">
					<h4>Featured Buses</h4>
					<ul>
						@foreach($buses as $bus)
							<li><a href="{{route('bus.details',['id'=>$bus->id])}}">{{$bus->agent->company}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 contact-box">
					<h4>Contact Us</h4>
					<p><i class="fa fa-home"></i> Plot 29, Nkinzi Rd Wandegeya Kampala-Uganda East Africa</p>
					<p><i class="fa fa-phone"></i> +256 704741443</p>
					<p><i class="fa fa-envelope-o"></i> support@ugabus.com</p>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12 text-center we-accept">
					<h4>We Accept</h4>
					<ul>
						<li><img src="/client_inc/assets/images/card/mastercard.png" alt="cruise"></li>
						<li><img src="/client_inc/assets/images/card/visa.png" alt="cruise"></li>
						<li><img src="/client_inc/assets/images/card/5.png" alt="cruise"></li>
						<li><img src="/client_inc/assets/images/card/6.png" alt="cruise"></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-footer-nav row">
			<div class="container clear-padding">
				<div class="col-md-6 col-sm-6">
					<p>Copyright &copy; <?php echo date('Y');?> Ugabus. All Rights Reserved.</p>
				</div>
				<div class="col-md-6 col-sm-6">
					<ul>
						
					</ul>
				</div>
				<div class="go-up">
					<a href="#"><i class="fa fa-arrow-up"></i></a>
				</div>
			</div>
		</div>
	</footer>
</section>
<!-- END: FOOTER -->