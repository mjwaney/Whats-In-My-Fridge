$(document).ready(function(){
	//createrecipe view
	$("#toggleSearch").click(function(){
	    $("#searchToggle").toggle();
	});

	$("#toggleImage").click(function(){
	    $("#imageToggle").toggle();
	});

	$("#toggleIngredients").click(function(){
	    $("#ingredientsList").toggle();
	});

	//account view
	$("#toggleFav").click(function(){
	    $("#favoriteList").toggle();
	});

	$("#toggleUser").click(function(){
	    $("#userinfo").toggle();
	});

	$("#toggleIng").click(function(){
	    $("#ingList").toggle();
	});

	$("#toggleUserRecipes").click(function(){
	    $("#userRecipeList").toggle();
	});
});	
