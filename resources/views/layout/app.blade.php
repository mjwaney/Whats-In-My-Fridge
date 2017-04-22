<html>

<head>
    <title>@yield('title')</title>
    <link href="{{ elixir('css/stylesheet.css') }}"" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="page">
        <div class="headerContainer">
            <div class="headerLogo"><a href="/" class="menuButton"><img src="{{asset('images/logoWhite.png')}}" height="50" /></a></div>
            <div class="headerFiller"></div>
            <div>

            </div>
            <div class="headerButton headerLogin"><a href="/register">Register</a></div>
            
            <div class="headerButton headerOptions"></div>
        </div>
        <div><img src="{{asset('images/headerImage.jpg')}}" class="headerImage" /></div>
        <br />
        <div class="menuContainer">
            <a href="/" class="menuButton">Home</a>
            <a href="/ingredients" class="menuButton">Ingredients</a>
            <a href="/recipes" class="menuButton">Recipe List</a>
            <a href="/findrecipes" class="menuButton">Find Recipes</a>
        </div>
        <div class="content">
            <div class="column left">
                <table border="0" class="ingredients">
                    <tr><td class="header">Ingredients</td><td></td></tr>
                    <tr><td class="content">1/2 cup mayonnaise</td></tr>
                    <tr><td class="content">1 teaspoon Cajun seasoning</td></tr>
                    <tr><td class="content">1 1/3 pounds ground beef sirloin</td></tr>
                    <tr><td class="content">1 jalapeno pepper, seeded and chopped</td></tr>
                    <tr><td class="content">1/2 cup diced white onion</td></tr>
                    <tr><td class="content">1 clove garlic, minced</td></tr>
                    <tr><td class="content">1 tablespoon Cajun seasoning</td></tr>
                    <tr><td class="content">1 teaspoon Worcestershire sauce</td></tr>
                    <tr><td class="content">4 slices pepperjack cheese</td></tr>
                    <tr><td class="content">4 hamburger buns, split</td></tr>
                    <tr><td class="content">4 leaves lettuce</td></tr>
                    <tr><td class="content">4 slices tomato</td></tr>
                </table>
            </div>
            <div class="column center"> 
                <h1 class="center">
                @section('h1title')
                    @show
              </h1>
                <p>
                    @section('p1')
                        @show
                </p>
                <p>
                    @section('p2')
                        @show
                </p>
                <p>
                    @section('p3')
                        @show
                </p>
            </div>
            <div class="column right">
                <table border="0" class="ingredients">
                    <tr><td class="header">Suggested recipes</td><td></td></tr>
                    <tr><td class="content">Slider-style Mini Burgers</td></tr>
                    <tr><td class="content">Big Smokey Burgers</td></tr>
                    <tr><td class="content">Garlic and Onion Burgers</td></tr>
                    <tr><td class="content">Game Day Hamburgers</td></tr>
                    <tr><td class="content">Bacon Wrapped Hamburgers</td></tr>
                </table>

            </div>
        </div>
    </div>
</body>

</html>