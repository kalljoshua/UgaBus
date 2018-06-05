
@extends('...layouts.user_layout')
@section('title')
    <title>Book Bus Tickets For Your Next Trip</title>
@endsection
@section('content')

@section('content')
@include('user.menu')

<style type="text/css">
	input[type="text"]{
		border-top: none !important;
		border-right: none !important;
		border-left: none !important;
		border-bottom: 1px dotted #2196f3 !important;
		box-shadow: none !important;
		-webkit-box-shadow: none !important;
		-moz-box-shadow: none !important;
		-moz-transition: none !important;
		-webkit-transition: none !important;
	}
	
	.heading{
    color: #2196f3;
}

.control{
padding-top:7px;
}

.reciept{
    border-top: 5px solid #2196f3;
    -webkit-box-shadow: 0px 5px 21px -2px rgba(0,0,0,0.47);
    -moz-box-shadow: 0px 5px 21px -2px rgba(0,0,0,0.47);
    box-shadow: 0px 5px 21px -2px rgba(0,0,0,0.47);
    margin-top: 10px;
	margin-bottom: 10px;
}
</style>

	<!-- START: PAGE TITLE -->
	<div class="row page-title page-title3">
		<div class="container clear-padding text-center">
			<h3>MERCEDES C CLASS</h3>
			<h4>
				<i class="fa fa-certificate"></i>
				MERCEDES
			</h4>
			<p><i class="fa fa-map-marker"></i> Mall Road, Shimla</p>
		</div>
	</div>
	<!-- END: PAGE TITLE -->
	
	<!-- START: CAR GALLERY -->
	<div class="row hotel-detail">
		<div class="container">
		<div class="reciept">
			<div class="row" style="margin-top:10px;">
				<div class="col-md-8">
					<div class="col-md-3">
		            <img class="media-object img-thumbnail user-img" style="height: 80px;" alt="User Picture" src="http://via.placeholder.com/80x80"></div>
				   <div class="col-md-9 text-right">
					<h4 class="heading">Aspirant English Classess</h4>
					<h5 class="heading">Hanuman Mandir C.C.Road, Deoria</h5>
					<h6 class="heading">+91 9455078760</h6>
					</div>
				</div>
				<div class="col-md-4">
					
					<div class="form-group">
		              <label class="col-md-4 control" >Date :</label>
		              <div class="col-md-8">
		                <input id="" name="name" type="text" readonly="true" placeholder="10-May-2017 02:05 pm" class="form-control">
		              </div>
		            </div>
				                
				    <div class="form-group">
		              <label class="col-md-4 control" >Reciept No. :</label>
		              <div class="col-md-8">
		                <input id="" name="name" type="text" readonly="true" placeholder="12349" class="form-control">
		              </div>
		            </div>
				                
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-md-12">
		            <div class="form-group">
		              <label class="col-md-3 control" for="">Student Name :</label>
		              <div class="col-md-9">
		                <input id="" name="name" type="text" readonly="true" placeholder="Your name" class="form-control">
		              </div>
		            </div>
					<div class="form-group">
		              <label class="col-md-3 control" for="">Course :</label>
		              <div class="col-md-9">
		                <input id="" name="name" type="text" readonly="true" placeholder="Course" class="form-control">
		              </div>
		            </div>
		         </div>
		     </div>
			 <div class="row">
				<div class="col-md-6">
					<div class="form-group">
		              <label class="col-md-6 control" for="">Section :</label>
		              <div class="col-md-6" style="padding-left:20px;">
		                <input id="" name="name" type="text" readonly="true" placeholder="Section" class="form-control" >
		              </div>
		            </div>
		            </div>
					<div class="col-md-6">
					<div class="form-group">
		              <label class="col-md-3 control" for="">Batch :</label>
		              <div class="col-md-9">
		                <input id="" name="name" type="text" readonly="true" placeholder="Batch" class="form-control">
		              </div>
		            </div>
		            </div>
		            </div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
		              <label class="col-md-3 control" for="name">Recieve Amount :</label>
		              <div class="col-md-9">
		                <input id="name" name="name" type="text" readonly="true" placeholder="Amount" class="form-control">
		              </div>
		            </div>
		            </div>
		            </div>
					<br/>
					<div class="row">
				<div class="col-md-6">
					<div class="form-group">
		              <label class="col-md-3 control" for="name">Cash :</label>
		              <div class="col-md-9">
		                <input id="checkbox2" type="checkbox" checked="" class="form-control">
		              </div>
		            </div>
					<div class="form-group">
		              <label class="col-md-3 control" for="name">Cheque :</label>
		              <div class="col-md-9">
		                <input id="checkbox2" type="checkbox" checked="" class="form-control">
		              </div>
		            </div>
					<div class="form-group">
		              <label class="col-md-3 control">Bank Transfer :</label>
		              <div class="col-md-9">
		                <input id="checkbox2" type="checkbox" checked="" class="form-control">
		              </div>
		            </div>
				 </div>
				 <div class="col-md-6">
					<div class="form-group">
		              <label class="col-sm-3 control">Bank Name :</label>
		              <div class="col-sm-9">
		                <input id="" name="name" type="text" readonly="true" placeholder="State Bank of India" class="form-control">
		              </div>
		            </div>
					<div class="form-group">
		              <label class="col-sm-3 control" >Cheque No :</label>
		              <div class="col-sm-9">
		                <input id="" name="name" type="text" readonly="true" placeholder="Cheque no" class="form-control">
		              </div>
		            </div>
					<div class="form-group">
		              <label class="col-sm-3 control" >Date :</label>
		              <div class="col-sm-9">
		                <input id="" name="name" type="text" readonly="true" placeholder="Date" class="form-control">
		              </div>
		            </div>
				 </div>
		            </div>
					<br/>
					<div class="row">
				<div class="col-md-12">
					<div class="form-group">
		              <label class="col-md-3 control" for="name">Recieved By :</label>
		              <div class="col-md-9">
		                <input id="name" name="name" type="text" readonly="true" placeholder="Authorised Person" class="form-control">
		              </div>
		            </div>
				</div>
				</div>
				<div class="row" style="margin-top:80px;">
				<div class="col-md-9">
				</div>
				<div class="col-md-3">
					<div class="form-group">
		              <label class="control" for="name"><u>Authorised Signatury</u></label>
		            </div>
				</div>
				</div>
				</div>
			</div>
		</div>
		</div>
	</div>

@endsection