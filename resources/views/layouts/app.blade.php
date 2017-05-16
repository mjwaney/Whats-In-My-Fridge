<!-- Base Layout of the website -->
<?php  if(session_status() == PHP_SESSION_NONE){session_start();}?>
<!DOCTYPE HTML>
<head>

@section('scripts') @show
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

	<!-- <script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script> -->
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
		<!-- Header Logo etc end -->

		<!-- Header Image -->
		<img src="/images/headerImage.jpg" class="headerImage" />
		<br />
		<br />
		<!-- Header Image end -->

		<!-- Navbar  -->
		<div class="menuContainer">
			<a href="/" class="menuButton">Home</a>
			<a href="/recipes" class="menuButton">Recipes</a>
			<a href="/findrecipe" class="menuButton">Search</a>
			@if (Auth::check())
				<a href="/createrecipe" class="menuButton">Create</a>
			@else
				<a href="/login" class="menuButton">Login</a>
			@endif
			<a href="/about" class="menuButton">About</a>
		</div>
		<!-- Navbar End -->

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

<!-- Scripts -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@section('bodyend')
	<!-- @show -->
</body>
</html>