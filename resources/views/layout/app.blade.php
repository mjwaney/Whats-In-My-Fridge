<!-- Base Layout of the website -->
<!DOCTYPE HTML>
<head>
@section('scripts')
  @show
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{ elixir('css/stylesheet.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.0.0/bootstrap-social.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>

<body>
    <div class="page">
        <div class="headerContainer">
            <div class="headerLogo">
            <a href="/" class="menuButton"><img src="{{asset('images/logoWhite.png')}}" height="50" /></a></div>
            <div class="headerFiller"></div>
        </div>
        <div><img src="{{asset('images/headerImage.jpg')}}" class="headerImage" /></div>

    <!-- Navbar  -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">News |</a>
          <a class="navbar-brand" href="/recipes">Recipes |</a>
          <a class="navbar-brand" href="/findrecipes">Find Recipe |</a>
          <a class="navbar-brand" href="/createrecipe">Create Recipe |</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            @if(auth()->check())
              @include('partials.user-menu')
            @else
            <li><a href="{{ action('LoginController@showLoginPage') }}">Sign In <i class="fa fa-sign-in"></i></a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Column Left -->
   <div class="content">
    <div class="column left">
        <div class="panel panel-default">
          <div class="panel-heading" id="ph1">Top Rated</div>
          <div class="panel-body">Recipe 1</div>
          <div class="panel-body">Recipe 2</div>
          <div class="panel-body">Recipe 3</div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading" id="ph2">Top Ingredients</div>
          <div class="panel-body">Butter</div>
          <div class="panel-body">Cheese</div>
          <div class="panel-body">Eggs</div>
        </div>
    </div>
    <!-- Column Left End -->

    <!-- Center Content -->
    <div class="column center"> 
        @section('p1') @show  
        @section('p2') @show 
        @section('p3') @show
    </div><!--  End Center Content -->

<!-- Column Right -->
    <div class="column right">

        <div class="panel panel-default">
          <div class="panel-heading" id="ph1">Top Rated</div>
          <div class="panel-body">
            Recipe 1
          </div>
          <div class="panel-body">
            Recipe 2
          </div>
          <div class="panel-body">
            Recipe 3
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading" id="ph2">Top Ingredients</div>
          <div class="panel-body">
            Butter
          </div>
          <div class="panel-body">
            Cheese
          </div>
          <div class="panel-body">
            Eggs
          </div>
        </div>
    </div>
    <!-- Column Right End -->
  </div> <!-- End Content -->
</div><!-- End Body/Page Div -->    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html>