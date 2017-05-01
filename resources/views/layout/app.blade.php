<!-- Base Layout of the website -->
<html>
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
    <style>
       .social-button:link{
        color:white;
       }

       .btn-block{
          margin: 10px;
          min-height: 50px;
          max-width: 270px;
          text-align: right;
          color: white;
       }

        body {
            padding-top: 73px;
        }
        .social-button {
            text-align: center;
        }
        ul {
            list-style-type: none;
        }
        li {
            margin-bottom: 3px;
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="headerContainer">
            <div class="headerLogo"><a href="/" class="menuButton"><img src="{{asset('images/logoWhite.png')}}" height="50" /></a></div>
            <div class="headerFiller"></div>
            <div>

            </div>
        </div>
        <div><img src="{{asset('images/headerImage.jpg')}}" class="headerImage" /></div>

    <!-- Navbar  -->
    <nav class="navbar navbar-inverse">
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
          <a class="navbar-brand" href="/createrecipe">Add Recipe |</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
            @if(auth()->check())
            @include('partials.user-menu')
        @else
            <li>
                <a href="{{ action('LoginController@showLoginPage') }}">
                    Sign In <i class="fa fa-sign-in"></i>
                </a>
            </li>
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
          <div class="panel-heading">Top Rated</div>
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
          <div class="panel-heading">Top Ingredients</div>
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
    <!-- Column Left End -->

    <!-- Center Content -->
    <div class="column center"> 
            @section('p1')
                @show
        <p>
        </p>
            @section('p2')
                @show
        <p>
        </p>
            @section('p3')
                @show 
        <p>
        </p>
    </div><!--  End Center Content -->
  </div> <!-- End Content -->
</div><!-- End Body/Page Div -->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

</html>