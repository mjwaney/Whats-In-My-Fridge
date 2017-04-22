<html>

<head>
	<title>What's in my fridge?</title>
	<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
	function DetectTheThing() {
		var uagent = navigator.userAgent.toLowerCase();
		if (uagent.search("iphone") > -1 ||
			uagent.search("ipad") > -1 || 
			uagent.search("android") > -1 ||
			uagent.search("blackberry") > -1 ||
			uagent.search("webos") > -1)
			window.location.href ="otherindex.html";
    }
	</script>
</head>

<body>
	<div class="page">
		<div class="headerContainer">
			<div class="headerButton headerLogin onclick-menu">
				Login
				<div class="onclick-menu-content">
					<button onclick="alert('click 1')">Look, mom</button>
					<button onclick="alert('click 2')">No JavaScript!</button>
					<button onclick="alert('click 3')">Pretty nice, right?</button>
					<a href="http://www.google.com">Google</a>
				</div>
			</div>
			<a href="register.html" class="headerButton headerLogin">Register</a>
			<div class="headerButton headerOptions"></div>
		</div>
		<div class="indexImage"><img src="images/logoBlack.png" style="height:40%;" /></div>
		<br />
		<div class="indexContainer">
			<div class="menuContainer">
                <a href="index.html" class="menuButton">Home</a>
                <a href="ingredients.html" class="menuButton">Ingredients</a>
				<a href="recipes.html" class="menuButton">Recipes</a>
                <a href="button.html" class="menuButton">Button</a>
			</div>
		</div>
	</div>
</body>

</html>