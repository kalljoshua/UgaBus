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
							<li><a href="https://www.facebook.com/UGABUS/?__mref=message_bubble"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/UgaBus_Ug"><i class="fa fa-twitter"></i></a></li>
							<!--<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
							<li><a href="https://www.youtube.com/channel/UCB7aZgTPZ74ZCangJ_TQLfw"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="main-footer row" style="background-color: #000000;>
			<div class="container clear-padding">
				<div class="col-md-3 col-sm-6 links">
					<h4>Usefull Links</h4>
					<ul>
						<li><a href="/"><b style="color: white;">Home</b></a></li>
						<li><a href="{{route('about.us')}}"><b style="color: white;">About Us</b></a></li>
						<li><a href="{{route('faq')}}"><b style="color: white;">FAQ</b></a></li>
						<li><a href="{{route('privacy.policy')}}"><b style="color: white;">Privacy Policy</b></a></li>
						<li><a href="{{route('use.terms')}}"><b style="color: white;">Terms of Use</b></a></li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 links">
					<h4>Popular Routes</h4>
					<ul>
						@foreach($route_id as $routes)
							<?php 
							$route = App\Route::find($routes)->first();
							?><li><a href="#"><b style="color: white;">{{$route['travel_from']}} <i class="fa fa-arrow-right"></i> {{$route['travel_to']}}</b></a></li> 
						@endforeach
					</ul>
				</div>
				<div class="clearfix visible-sm-block"></div>
				<div class="col-md-3 col-sm-6 links">
					<h4>Featured Buses</h4>
					<ul>
						@foreach($buses as $bus)
							<li><a href="{{route('bus.details',['id'=>$bus->id])}}"><b style="color: white;">{{$bus->company->company_name}}</b></a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 contact-box">
					<h4>Contact Us</h4>
					<p><b style="color: white;"><i class="fa fa-home"></i> Plot 29, Nkinzi Rd Wandegeya Kampala-Uganda East Africa</b></p>
					<p><b style="color: white;"><i class="fa fa-phone"></i> +256 704741443</b></p>
					<p><b style="color: white;"><i class="fa fa-envelope-o"></i> support@ugabus.com</b></p>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12 text-center we-accept">
					<h4>We Accept</h4>
					<ul>
						<li><img src="/client_inc/assets/images/card/mastercard.png" alt="cruise"></li>
						<li><img src="/client_inc/assets/images/card/visa.png" alt="cruise"></li>
						<li><img src="/client_inc/assets/images/card/5.png" style="width: 54px; height: 30px" alt="cruise"></li>
						<li><img src="/client_inc/assets/images/card/6.png" style="width: 54px; height: 30px" alt="cruise"></li>
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