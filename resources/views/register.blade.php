<html>

<head>
	<title>Recipes</title>
	<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="page">
		<div class="headerContainer">
			<div class="headerLogo"><a href="index.html" class="menuButton"><img src="images/logoWhite.png" height="50" /></a></div>
			<div class="headerFiller"></div>
            <div>

            </div>
			<div class="headerButton headerLogin">Login</div>
			<a href="register.html" class="headerButton headerLogin">Register</a>
			<div class="headerButton headerOptions"></div>
		</div>
		<div><img src="images/headerImage.jpg" class="headerImage" /></div>
		<br />
		<div class="menuContainer">
			<a href="index.html" class="menuButton">Home</a>
			<div class="menuButton">Ingredients</div>
			<div class="menuButton">Recipes</div>
			<div class="menuButton">Button</div>
		</div>
		<div class="content">
			<div class="column left">

			</div>
			<div class="column center">
				<form method="post" style="display:flex;justify-content:center;">
					<table border="0">
						<tr>
							<td>{{ "User" . "name:"}} </td>
							<td><input type="text" name="username" placeholder="Username" class="registerInput" required autofocus /> *</td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="text" name="email" placeholder="Email" class="registerInput" required /> *</td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="password" placeholder="Password" class="registerInput" required /> *</td>
						</tr>
						<tr>
							<td>Repeat password:</td>
							<td><input type="password" name="passwordRepeat" placeholder="Repeat password" class="registerInput" required /> *</td>
						</tr>
						<tr>
							<td colspan="2"><hr /></td>
						</tr>
						<tr>
							<td>Full name:</td>
							<td><input type="text" name="name" placeholder="Full name" class="registerInput" /></td>
						</tr>
						<tr>
							<td>Tell us something<br />about your taste:</td>
							<td><textarea cols="20" rows="5" placeholder="Tell us something about your taste." class="registerInput"></textarea></td>
						</tr>
						<tr>
							<td>Recipes: </td>
							<td><input type="text" name="recipes" placeholder="Recipes" class="registerInput" /></td>
						</tr>
						<tr>
							<td colspan="2"><hr /></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Submit" class="registerSubmit" /></td>

						</tr>
					</table>
				</form>
				<p style="float:right;">Fields marked with * are required.</p>
			</div>
			<div class="column right">

			</div>
		</div>
	</div>
</body>

</html>