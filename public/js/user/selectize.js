
var url = $(location).attr('href');
var root = url;
var list = [];
var phrases = [];
var search = [];
var selectizeAdd = [];
var modalAdd = [];

/*
|--------------------------------------------------------------------------
| Selectize Plugin
|--------------------------------------------------------------------------
*/
$(document).ready(function()
{
	 $('#searchbox').selectize({
			valueField: 'name',
			labelField: 'name',
			searchField: ['name'],
			options: [],
			create: false,
			highlight: false,
			optgroups: [
				 {value: 'ingredient', label: 'Ingredients'},
				 {value: 'category', label: 'Categories'}
			],
			optgroupField: 'class',
			optgroupOrder: ['ingredients','categories'],
			load: function(query, callback) 
			{
				 if (!query.length) return callback();
				 $.ajax({
						url: '/api/search?q=xxxx',
						type: 'GET',
						dataType: 'json',
						data: 
						{
							 q: query
						},
						error: function() 
						{
							 callback();
						},
						success: function(res) 
						{
							 callback(res.data);
						}
				 });
			},
			onChange: function()
			{
				 // window.location = this.items[0];
			},

			onItemAdd(value, $item)
			{
				selectizeAdd.push(value);
				document.getElementById("ingpanel").innerHTML += '<li class="list-group-item listItem">' + value + '</li>'; 
			}
	 });
});

/*
|--------------------------------------------------------------------------
| Remove Clicked List Items
|--------------------------------------------------------------------------
*/

$(document).ready(function(){

	 $("ul.list").on('click', 'li', function(){
			window.phrases.splice($.inArray($(this).text(), window.phrases), 1);
			$(this).remove();
	 });
});   

/*
|--------------------------------------------------------------------------
| Post Modal &or Selectize Ingredients
|--------------------------------------------------------------------------
*/

$(document).ready(function()
{
	$("#createRecipe").on('submit', function(e)
 	{
 		e.preventDefault();

 		$(".phrase").each(function()
 		{ 			
 			var phrase = '';
 			$(this).find('li').each(function()
 			{
 				window.phrases.push($(this).text());
 			});
 		});
 		unique = window.phrases.filter(function(elem, index, self) {
 		    return index == self.indexOf(elem);
 		})

 		var ings = [];

 		$.each(unique, function( index, value ) {
 			ingObj = new Object();
 			ingObj.name = 'ing[]';
 			ingObj.value = value;
 			ings.push(ingObj);
 		 });

 		// alert(ings);
 		var ings2 = $.param(ings);

 		var formData = $("#createRecipe").serialize();
 		formData = formData + '&' + ings2;
 		// alert(formData);
		$.ajax
		({
		    type: 'post',
		    url: 'storeRecipe',
		    data: formData,
		    async: false,
		    success: function () 
		    {
		       alert('Recipe has been added');
		    }
		});
 	});
});

/*
|--------------------------------------------------------------------------
| Post Modal &or Selectize Ingredients to User Fridge
|--------------------------------------------------------------------------
*/

$(document).ready(function()
{
	$("#accountIngredients").on('submit', function(e)
 	{
 		e.preventDefault();

 		$(".phrase").each(function()
 		{ 			
 			var phrase = '';
 			$(this).find('li').each(function()
 			{
 				window.phrases.push($(this).text());
 			});
 		});
 		unique = window.phrases.filter(function(elem, index, self) {
 		    return index == self.indexOf(elem);
 		})

 		var ings = [];

 		$.each(unique, function( index, value ) {
 			ingObj = new Object();
 			ingObj.name = 'ing[]';
 			ingObj.value = value;
 			ings.push(ingObj);
 		 });

 		// alert(ings);
 		// var ings2 = $.param(ings);

 		// formData = formData + '&' + ings2;
		// alert(ings2);
 		// alert(formData);
		$.ajax
		({
		    type: 'get',
		    url: 'storeFridge',
		    data: ings,
		    async: false,
		    success: function () 
		    {
		       alert('Ingredients have been stored');
		    }
		});
 	});
});

/*
|--------------------------------------------------------------------------
| Dynamic Search Results 
|--------------------------------------------------------------------------
*/

$(document).ready(function()
{	
	//Add to the ingpanel id when there's a change
	$( "#ingpanel" ).on('DOMSubtreeModified', function() {

		//Get the list items
		$(".phrase").each(function()
		{ 	
			var phrase = '';
			$(this).find('li').each(function()
			{	
				//push its text to the global variable
				window.search.push($(this).text());
			});
		});

		//filter out the duplicates
		unique = window.search.filter(function(elem, index, self) {
		    return index == self.indexOf(elem);
		})

		//declare array 
		var ings = [];

		//and put the list items in it as objects
		$.each(unique, function( index, value ) {
			ingObj = new Object();
			ingObj.name = 'ing[]';
			ingObj.value = value;
			ings.push(ingObj);
		 });

		// alert(ings);
		var newData = $.param(ings);

		//get data from FindRecipeController
		$.ajax
		({
		    type: 'get',
		    url: 'search',
		    data: newData,
		    dataType: 'html',
		    async: false,
		    success: function (res) 
		    {

		    	    var result = $.parseJSON(res);
		    	    // alert(JSON.stringify(res));
		    	    var output= "<ul>";

		    	    for (i=0; i < result.data.length; i++){
		    	        output += '<li class="list-group-item"><a class="center" href="recipes/' + result.data[i].id + '"></a><h2 class="center">' + result.data[i].name + '</h2><br><img src="' + result.data[i].image + '"><br>';
		    	        
		    	        for (n=0; n < result.ingr.length; n++){
		    	        		output += '<li class="list-group-item"><h2 class="center">Uses: ' + result.ingr[n].name +'</h2>';
		    	        }
		    	        output += '<li class="list-group-item"><h2 class="center">Missing: ';
		    	        for (l=0; l < result.noning.length; l++){
		    	        		output += result.noning[l].name + ', ';
		    	        }
		    	    }
		    	    output += "</h2></li></ul>";

		    	    document.getElementById("results").innerHTML += output;
		    	    $("#searchresults").toggle();
		    }
		});
	});
});
