<!-- Base Layout of the website -->
<?php  if(session_status() == PHP_SESSION_NONE){session_start();}?>
<!DOCTYPE HTML>
<head>
	<!-- Scripts (needs to be cleaned up one day) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }	});
	</script>
	<script src="http://localhost:8000/js/user/toggle.js"></script><!-- Toggles Script -->
	<script src="http://localhost:8000/js/user/selectize.js"></script><!-- Selectize Script -->
	<script src="http://localhost:8000/js/user/account.js"></script><!-- Account Scripts -->
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js" data-modules="effect effect-bounce effect-blind effect-bounce effect-clip effect-drop effect-fold effect-slide"></script>
	

	<title>@yield('title') - What's In My Fridge?</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->

	<!-- Stylesheets -->
	<link href="{{ elixir('css/stylesheet.css') }}" rel="stylesheet" type="text/css" />
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<link href="/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.0.0/bootstrap-social.min.css">
	<!-- Stylesheets end -->
</head>
<body>
	<div class="page">
		<!-- Header Logo, Login/Register and Account/Logout -->
		<div class="headerContainer">
			<div class="headerLogo">
				<a href="/" class="menuButton"><img src="/images/logoWhite.png" height="50" /></a>
			</div>

			<!-- Check if logged in -->
			@if (Auth::check())
				<a href="/account" class="headerButton headerLogin">Account</a>
				<a href="/logout" class="headerButton headerLogin">Logout</a>
			@else
				<a href="/login" class="headerButton headerLogin">Login</a>
				<a href="/register" class="headerButton headerLogin">Register</a>
			@endif
			<!-- Check end -->

			<div class="headerButton headerOptions"></div>
		</div>
		
		<!-- Carousel Header Logo etc end -->
		<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
			
			<!-- Header Image -->
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    	<div class="active item"><img src="/images/headerImage.jpg"></div>
				<div class="item"><img src="/images/headerImage2.jpg"></div>
				<div class="item"><img src="/images/headerImage3.jpg"></div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
			</a>
		</div><!-- End Carousel -->

		<!-- <br /> -->
		<br />
		<!-- Header Image end -->

		<!-- Navbar  -->
		<div class="menuContainer">
			<a href="/" class="menuButton">Home</a>
			<a href="/findrecipes" class="menuButton">Search</a>
			<a href="/recipes" class="menuButton">Recipes</a>
			@if (Auth::check())
				<a href="/createrecipe" class="menuButton">Create</a>
			@else
				<a href="/login" class="menuButton">Login</a>
			@endif
			<a href="/about" class="menuButton">About</a>
		</div>
		<!-- Navbar End -->
	
		@section('fullwidth') @show  
	<div class="content">
	<!-- Column Left -->
	<div class="column left">
		@section('left') @show
	</div>
	<!-- Column Left End -->

	<!-- Center Content -->
	<div class="column center"> 
		@section('p1') @show  
		@section('p2') @show 
		@section('p3') @show
	</div>
	<!--  End Center Content -->

	<!-- Column Right -->
	<div class="column right">
		@section('right') @show
	</div>
	<!-- Column Right End -->

	</div>
	<!-- End Content -->

</div>
<!-- End Body/Page Div -->


@section('bodyend') @show
</body>
</html>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
