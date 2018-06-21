@extends('...layouts.user_layout')
@section('title')
    <title>Book Bus Tickets For Your Next Trip</title>
@endsection

@section('content')

@include('user.menu')

<!-- START: PAGE TITLE -->
	<div class="row page-title">
		<div class="container clear-padding text-center flight-title">
			<h3>Terms of Use</h3>
		</div>
	</div>
	<!-- END: PAGE TITLE -->
	
	<!-- START: LOGIN/REGISTER -->
	<div class="row misc-row" style="background-color: white">
		<div class="container clear-padding">
			<div class="col-md-12 clear-padding">
				<h3 class="text-center">Terms of Use</h3>
				<div class="space"></div>
				<div class="panel-group element-accordian" id="accordion">
					<div class="common-content">
            <p><strong>SORRY!</strong> <br/>Content will be added soon. Check with us later.</p>
            <p>Contact adminstrators on +256-704741443 for more help.</p>
          </div>
					
				</div>
				
			</div>
			
			
		</div>
	</div>
	<!-- END: LOGIN/REGISTER -->

@endsection