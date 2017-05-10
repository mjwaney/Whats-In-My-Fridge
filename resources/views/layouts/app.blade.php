<!-- Base Layout of the website -->
<!DOCTYPE HTML>
<head>

@section('scripts')
	@show
		<title>@yield('title') - What's in my fridge?</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		</script>

		<!-- Stylesheets -->
		<link href="{{ elixir('css/stylesheet.css') }}" rel="stylesheet" type="text/css" />
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
		<link href="/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.0.0/bootstrap-social.min.css">
		<script>
			 $.ajaxSetup({
					 headers: {
							 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					 }
			 });
		</script>
</head>

<body>
		<div class="page">
		<div class="headerContainer">
			<div class="headerLogo">
				<a href="/" class="menuButton"><img src="/images/logoWhite.png" height="50" /></a>
			</div>

			@if (Auth::check())
				<a href="{{ '/account' }}" class="headerButton headerLogin">Account</a>
				<a href="{{ '/logout' }}" class="headerButton headerLogin">Logout</a>
			@else
				<a href="{{ '/login' }}" class="headerButton headerLogin">Login</a>
				<a href="{{ '/register' }}" class="headerButton headerLogin">Register</a>
			@endif

			<div class="headerButton headerOptions"></div>
		</div>

		<img src="/images/headerImage.jpg" class="headerImage" />
		<br />
		<br />
		<!-- Navbar  -->
		<div class="menuContainer">
			<a href="/" class="menuButton">Home</a>
			<a href="/recipes" class="menuButton">Ingredients</a>
			<a href="/findrecipes" class="menuButton">Find Recipes</a>
			<a href="/createrecipe" class="menuButton">Add Recipes</a>
		</div>
		<!-- Navbar End -->
	<div class="content">

		<!-- Column Left -->
			<div class="column left">
				@section('content-left')
				@show
			</div>
		<!-- Column Left End -->

		<!-- Center Content -->
		<div class="column center"> 
				@section('p1') @show  
				@section('p2') @show 
				@section('p3') @show
		</div><!--  End Center Content -->

		<!-- Column Right -->
			@section('right') @show
		<!-- Column Right End -->
	</div> <!-- End Content -->
</div><!-- End Body/Page Div -->

<!-- Scripts -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src='//code.jquery.com/jquery-1.10.2.min.js'></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	crossorigin="anonymous"></script> -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#searchbox').selectize({
				valueField: 'url',
				labelField: 'name',
				searchField: ['name'],
				maxOptions: 10,
				options: [],
				create: false,
				optgroups: [
						{value: 'ingredients', label: 'ingredients'},
						{value: 'category', label: 'Categories'}
				],
				optgroupField: 'class',
				optgroupOrder: ['ingredients','category'],
				load: function(query, callback) {
						if (!query.length) return callback();
						$.ajax({
								url: root+'/api/search',
								type: 'GET',
								dataType: 'json',
								data: {
										q: query
								},
								error: function() {
										callback();
								},
								success: function(res) {
										callback(res.data);
								}
						});
				},
				onChange: function(){
						window.location = this.items[0];
				}
		});
});
</script>
</body>
</html>