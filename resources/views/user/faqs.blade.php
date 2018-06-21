@extends('...layouts.user_layout')
@section('title')
    <title>Book Bus Tickets For Your Next Trip</title>
@endsection

@section('content')

@include('user.menu')

<!-- START: PAGE TITLE -->
	<div class="row page-title">
		<div class="container clear-padding text-center flight-title">
			<h3>Frequently Asked Questions</h3>
		</div>
	</div>
	<!-- END: PAGE TITLE -->
	
	<!-- START: LOGIN/REGISTER -->
	<div class="row misc-row" style="background-color: white">
		<div class="container clear-padding">
			<div class="col-md-12 clear-padding">
				<h3 class="text-center">Frequently Asked Questions</h3>
				<div class="space"></div>
				@if(sizeOf($faqs)>0)
				<div class="panel-group element-accordian" id="accordion">
					@foreach($faqs as $faq)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">{{$faq->question}}<i class="fa fa-chevron-down pull-right"></i></a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in">
							<div class="panel-body">
								<p>{{$faq->answer}}</p>
							</div>
						</div>
					</div>
					@endforeach
					
				</div>
				@else
				<p>SORRY! <br/>Questions not added yet, Please check again later.</p>
				@endif
			</div>
			
			
		</div>
	</div>
	<!-- END: LOGIN/REGISTER -->

@endsection