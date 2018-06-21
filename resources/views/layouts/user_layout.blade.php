<!DOCTYPE html>
<html class="load-full-screen">
<head>
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="LimpidThemes">
	
	@yield('title')
	
    <!-- STYLES -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/client_inc/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
	<link href="/client_inc/assets/css/animate.min.css" rel="stylesheet">
	<link href="/client_inc/assets/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="/client_inc/assets/css/owl.carousel.css" rel="stylesheet">
	<link href="/client_inc/assets/css/owl-carousel-theme.css" rel="stylesheet">
    <link href="/client_inc/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/client_inc/assets/css/flexslider.css" rel="stylesheet" media="screen">
	<link href="/client_inc/assets/css/style.css" rel="stylesheet" media="screen">
	<!-- LIGHT -->
	<link rel="stylesheet" type="text/css" 
	href="/client_inc/assets/css/dummy.css" id="select-style">
	<link href="/client_inc/assets/font-awesome/css/font-awesome.min.css" 
	rel="stylesheet">
	
	<link href="/client_inc/assets/css/light.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="/html5-editor/bootstrap-wysihtml5.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600' 
	rel='stylesheet' type='text/css'>

</head>
<body class="load-full-screen">

<!-- BEGIN: PRELOADER -->
<div id="loader" class="load-full-screen">
	<div class="loading-animation">
		<span><i class="fa fa-plane"></i></span>
		<span><i class="fa fa-bed"></i></span>
		<span><i class="fa fa-ship"></i></span>
		<span><i class="fa fa-suitcase"></i></span>
	</div>
</div>
<!-- END: PRELOADER -->


<!-- BEGIN: SITE-WRAPPER -->
<div class="site-wrapper">

@include('user.header')

@yield('content')

@include('user.footer')

</div>
<!-- END: SITE-WRAPPER -->

<!-- Load Scripts -->

<script src="/client_inc/assets/js/respond.js"></script>
<script src="/client_inc/assets/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="/js/starrr.js"></script>
<script>
   	$(function(){
       $('.textarea_editor').wysihtml5();
    });
</script>
<!-- wysuhtml5 Plugin JavaScript -->
    <script src="/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="/html5-editor/bootstrap-wysihtml5.js"></script>
<script>
    $('div.alerts').not('.alert-important').delay(5000).fadeOut(1500);
</script>
<script src="/client_inc/assets/plugins/owl.carousel.min.js"></script>
<script src="/client_inc/assets/js/bootstrap.min.js"></script>
<script src="/client_inc/assets/js/jquery-ui.min.js"></script>
<script src="/client_inc/assets/js/bootstrap-select.min.js"></script>
<script src="/client_inc/assets/plugins/wow.min.js"></script>
<script type="text/javascript" 
src="/client_inc/assets/plugins/supersized.3.1.3.min.js"></script>
<script src="/client_inc/assets/plugins/jquery.magnific-popup.min.js"></script>
<script src="/client_inc/assets/js/js.js"></script>
<script type="text/javascript" src="/client_inc/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript">  
			
			jQuery(function($){
				"use strict";
				$.supersized({
				
					//Functionality
					slideshow               :   1,		//Slideshow on/off
					autoplay				:	1,		//Slideshow starts playing automatically
					start_slide             :   1,		//Start slide (0 is random)
					random					: 	0,		//Randomize slide order (Ignores start slide)
					slide_interval          :   10000,	//Length between transitions
					transition              :   1, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	500,	//Speed of transition
					new_window				:	1,		//Image links open in new window/tab
					pause_hover             :   0,		//Pause slideshow on hover
					keyboard_nav            :   0,		//Keyboard navigation on/off
					performance				:	1,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,		//Disables image dragging and right click with Javascript

					//Size & Position
					min_width		        :   0,		//Min width allowed (in pixels)
					min_height		        :   0,		//Min height allowed (in pixels)
					vertical_center         :   1,		//Vertically center background
					horizontal_center       :   1,		//Horizontally center background
					fit_portrait         	:   1,		//Portrait images will not exceed browser height
					fit_landscape			:   0,		//Landscape images will not exceed browser width
					
					//Components
					navigation              :   1,		//Slideshow controls on/off
					thumbnail_navigation    :   1,		//Thumbnail navigation
					slide_counter           :   1,		//Display slide numbers
					slide_captions          :   1,		//Slide caption (Pull from "title" in slides array)
					slides 					:  	[		//Slideshow Images
														{image : '/client_inc/assets/images/bg-image12.jpg', title : 'Slide 1'}
												]
												
				}); 
		    });
		    
</script>
</body>
</html>