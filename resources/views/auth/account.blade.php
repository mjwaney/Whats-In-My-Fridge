<?php use App\Recipe; ?>
@extends('layouts.app')
@section('title','Profile')

@section('p1')
<script>
$(document).ready(function()
{	
	//Add to the ingpanel id when there's a change
	var ingName = [];
	$(".ingname").each(function(i){

		ingName.push($(this).text());
		// alert($(this).text());
	});
	// alert(ingName);

	//declare array 
	var ings = [];

	$.each(ingName, function( index, value ) {
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
	    	    result = $.parseJSON(res);
	    	    // alert('checkpoint');
	    	    // alert(JSON.stringify(result.data));
	    	    // alert(JSON.stringify(result.data).slice(1, -1));

	    	    var output= "<ul>";

	    	    for (i=0; i < result.data.length; i++){
	    	        output += '<li class="list-group-item"><a class="center" href="recipes/' + result.data[i].id + '"><h2 class="center">' + result.data[i].name + '</h2><br><img src="' + result.data[i].image + '"></a><br>';
	    	        
	    	        for (n=0; n < result.ingr.length; n++){
	    	        		output += '<li class="list-group-item"><h2 class="center">Uses: ' + result.ingr[n].name +'</h2>';
	    	        }
	    	        output += '<li class="list-group-item"><h2 class="center">Missing: ';
	    	        for (l=0; l < result.noning.length; l++){
	    	        		output += result.noning[l].name + ', ';
	    	        }
	    	        output += "</h2>";
	    	    }
	    	    output += "</li></ul>";

	    	    document.getElementById("results").innerHTML += output;
	    	    $("#searchresults").toggle();
	    }
	});
});
</script>
	<h1 class="center">Profile</h1>

	<!-- Your Info -->
	<div class="panel panel-default">
		<div class="panel-heading clearfix" id="toggleUser"><h2 class="white">Your Info<span class="glyphicon glyphicon-chevron-down pull-right"></h2></div>
		<div class="panel-body" id="userinfo" style="display:none;">
			<table border="0" style="padding-left: 50px;">
				<tr>
					<td><h2 class="center">Username:</h2></td>
					<td><h2 class="center">{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</h2></td>
				</tr>
				<tr>
					<td><h2 class="center">Email:</h2></td>
					<td><h2 class="center">{{ isset(Auth::user()->name) ? Auth::user()->email : Auth::user()->email }}</h2></td>
				</tr>
				<tr>
					<td><h2 class="center">Member since: </h2></td>
					<td><h2 class="center">{{ isset(Auth::user()->name) ? Auth::user()->created_at : Auth::user()->email }}</h2></td>
				</tr>
			</table><br><br>
		</div>
	</div>

	<!-- Your Fridge: your ingredients, expiration date -->
	<div class="panel panel-default">
		<div class="panel-heading clearfix " id="toggleIng"><h2 class="white">Your Fridge<span class="glyphicon glyphicon-chevron-down pull-right"></span></h2></div>
		<div class="panel-body" id="ingList" style="display:none;">
		<table class="fridgeContents">
			<th class="fridgetable"><h2 class="group inner list-group-item-heading center">Contents</h2></th>
			<th class="fridgetable"><h2 class="group inner list-group-item-heading center">Expires on:</h2></th>
				@foreach($userIng as $index => $ing)
					<tr class="ingRow">
						<td class="fridgetable ingname">{{ $ing->name }}</h2></td>
					@if($ingDate[$index])
						<td> {{ $ingDate[$index] }} </td>
					@else							
						<td class="fridgetable dP">
							<div class="input-group date">
							    <input type="text" id="datepicker" class="form-control datepicker">
							    	<script>
							    		$(".datepicker" ).datepicker({
							    			dateFormat: "yy-mm-dd",
							    			minDate: 0,
							    		});
							    	</script>
					    			<div class="input-group-addon">
					    				<span class="glyphicon glyphicon-th"></span>
					    			</div>
							</div>
						</td>
						<td class="fridgetable">
							<button onclick="addDate(this)" id="exp" class="btn btn-default">Confirm Date</button>
						</td>
					@endif
						<td class="fridgetable">
							<button onclick="removeRow(this)" class="btn btn-default glyphicon glyphicon-trash"></button>
						</td>
					</tr>
				@endforeach
		</table>
			@include('partials.selectize') 
			
			{!! Form::open(array('id'=>'accountIngredients', 'route' => 'postFridge')) !!}
				{{ Form::submit('Update Fridge', array('id'=>'submitFridge',  'class' => 'btn btn-default')) }}
			{!! Form::close() !!}
		</div>
		
	</div>
	
	<!-- Your Recipes -->
	<div class="panel panel-default">
		<div class="panel-heading clearfix " id="toggleUserRecipes"><h2 class="white">Your Recipes<span class="glyphicon glyphicon-chevron-down pull-right"></span></h2></div>
		<div class="panel-body" id="userRecipeList" style="display:none;">
		<table>
			@foreach($userRec as $key=>$r)
			<tr>
				<th class="group inner list-group-item-heading center"><a href="recipes/{{ $r->id }}" class="fh">{{$r->name}}</a><button onclick="removeRecipe(this)" class="btn btn-default glyphicon glyphicon-trash pull-right"><br></th>
			</tr>
			@endforeach
		</table><br><br>
		</div>
	</div>
	
	<!-- Your Favorites -->
	@isset(Auth::user()->name) 
	<div class="panel panel-default">
	<div class="panel-heading clearfix" id="toggleFav"><h2 class="white">Your Favorites<span class="glyphicon glyphicon-chevron-down pull-right"></h2></div>
			<div class="panel-body" id="favoriteList" style="display:none;">
				<ul class="list-group">
				@foreach(Auth::user()->favorite(Recipe::class) as $fav)
					<li class="list-group-item">
						<div class="panel-body">
							<a href="recipes/{{ $fav->id }}" >{{ $fav->name }}</a><br>
							<img src="{{ $fav->image }}"> 
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	@endisset
	
	<div class="panel panel-default""><!-- Panel -->
		<div class="panel-heading clearfix" id="toggleFridgeRec"><h2 class="white">Your Fridge Recipes<span class="glyphicon glyphicon-chevron-down pull-right"></h2></div>
		</div>  
			<div class="panel-body" id="fridgeRecList" style="display:none;"><!-- Panel Body-->
				<div class="form-group" id="results">
				</div>
			</div>
	</div>
@endsection

