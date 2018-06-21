
@extends('...layouts.user_layout')
@section('title')
    <title>Book Bus Tickets For Your Next Trip</title>
@endsection

@section('content')

@include('user.menu')

<!-- START: PAGE TITLE -->
	<div class="row page-title">
		<div class="container clear-padding text-center flight-title">
			<h3>{{$story->title}}</h3>
		</div>
	</div>
	<!-- END: PAGE TITLE -->
	
	<!-- START: BOOKING DETAILS -->
	<div class="row" style="background-color: white">
		<div class="container clear-padding">
			<div>
				<div class="col-md-12">
					<div class="single-post-wrapper">
						<div class="blog-title">
							<h3>{{$story->title}}</h3>
							<p><i class="fa fa-user"></i><a href="#">{{$story->user->last_name}}</a><i class="fa fa-clock-o"></i><a href="#">{{$story->created_at->diffForHumans()}}</a> </p>
						</div>
						<div class="main-content">
							<img src="/images/story/uuser_1258x600/{{$story->image}}" alt="cruise">
							<p> {!! $story->body !!}</p>
							<div class="social-share text-center">
								<p>
									Share this post: 
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-pinterest"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-rss"></i></a>
								</p>
							</div><!--
							<div class="blog-links">
								<div class="pull-left">
									<a href="#"><i class="fa fa-chevron-left"></i> Why we use lorem lpsum?</a>
								</div>
								<div class="pull-right">
									<a href="#">What is lorem lpsum? <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="author-wrapper">
								<div class="author-detail">
									<div class="col-md-2 col-sm-2 col-xs-2">
										<img src="assets/images/user1.jpg" alt="cruise">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10">
										<h4>About Author</h4>
										<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
									</div>
								</div>
							</div>-->
							<div class="clearfix"></div><!--
							<div class="comment-box">
								<h4>Comments (3)</h4>
								<div class="comment-wrapper">
									<div class="col-md-2 col-sm-2 col-xs-2">
										<img src="assets/images/user.jpg" alt="cruise">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10">
										<div class="comment-body">
											<h4>Lenore</h4>
											<span><i>24 Sept, 2015</i></span>
											<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old</p>
											<h5>
												<a href="#"><i class="fa fa-reply"></i>Reply</a>
												<a href="#"><i class="fa fa-thumbs-o-up"></i>(10)</a>
												<a href="#"><i class="fa fa-thumbs-o-down"></i>(5)</a>
											</h5>
										</div>
									</div>
								</div>
								<div class="comment-wrapper">
									<div class="col-md-2 col-sm-2 col-xs-2">
										<img src="assets/images/user.jpg" alt="cruise">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10">
										<div class="comment-body">
											<h4>Jenifer</h4>
											<span><i>24 Sept, 2015</i></span>
											<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old</p>
											<h5>
												<a href="#"><i class="fa fa-reply"></i>Reply</a>
												<a href="#"><i class="fa fa-thumbs-o-up"></i>(10)</a>
												<a href="#"><i class="fa fa-thumbs-o-down"></i>(5)</a>
											</h5>
										</div>
									</div>
								</div>
								<div class="leave-comment">
									<h4>Leave a Comment</h4>
									<form >
										<div class="col-md-6 col-sm-6">
											<label>Name</label>
											<input type="text" class="form-control" name="name" required>
										</div>
										<div class="col-md-6 col-sm-6">
											<label>Email</label>
											<input type="email" class="form-control" name="email" required>
										</div>
										<div class="col-md-12">
											<label>Review Title</label>
											<input type="text" class="form-control" name="review-title" required>
										</div>
										<div class="col-md-12">
											<label for="comment">Comment</label>
											<textarea class="form-control" rows="5" id="comment"></textarea>
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-default submit-review">Submit</button>
										</div>
									</form>
								</div>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: BOOKING DETAILS -->

@endsection