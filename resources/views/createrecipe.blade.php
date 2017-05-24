@section('scripts') 
{!! Html::script('js/user/toggle.js') !!} 
@endsection

@extends('layouts.app')
@section('title', 'Create Recipe')
@section('p1')
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<h1 class="center">Add a Recipe - {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</h2><br>
<br>

<!-- Add Ingredients -->
<div class="panel panel-default">
	<div class="panel-heading clearfix" id="toggleSearch"><h2 class="white">Recipe Ingredients</h2></div>
	<div class="panel-body" id="searchToggle" style="display:none;">
		@include('partials.selectize')<br><br>
	</div>
</div>

<!-- Image upload -->
<div class="panel panel-default">
	<div class="panel-heading clearfix" id="toggleImage"><h2 class="white">Upload an Image</h2></div>
	<div class="panel-body" id="imageToggle" style="display:none;">
		@include('partials.resizeImage') <br><br>
	</div>
</div>

{!! Form::open(array('id'=>'createRecipe', 'route' => 'postStore')) !!}

	<!-- Title Input -->
	{{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Recipe Title', 'required' => 'required')) }}<br><br>

	<!-- Type of Recipe -->
	<div >
	<table class="typeTable">
		<tr>
			<td class="setType"><h3 class="center">{{ Form::checkbox('type', 'snack', null) }} Snack</h3></td>
			<td class="setType"><h3 class="center"> {{ Form::checkbox('type', 'breakfast', null) }} Breakfast</h3></td>
			<td class="setType"><h3 class="center"> {{ Form::checkbox('type', 'lunch', null)}} Lunch</h3></td>
		</tr>
		<tr>
			<td class="setType"><h3 class="center">{{ Form::checkbox('type', 'dinner', null, ['class' => 'setType']) }} Dinner</h3></td>
			<td class="setType"><h3 class="center">{{ Form::checkbox('type', 'dessert', null, ['class' => 'setType']) }} Dessert</h3></td>
			<td class="setType"><h3 class="center">{{ Form::checkbox('type', 'sidedish', null, ['class' => 'setType']) }} Side Dish</h3></td>
		</tr>
		<tr>
			<td class="setType"><h3 class="center">{{ Form::checkbox('type', 'fastfood', null, ['class' => 'setType']) }} Fast Food</h3></td>
			<td class="setType"><h3 class="center">{{ Form::checkbox('type', 'vegan', null, ['class' => 'setType']) }} Vegan</h3></td>
			<td class="setType"><h3 class="center">{{ Form::checkbox('type', 'lowfat', null, ['class' => 'setType']) }} Low Fat</h3></td>
		</tr>
		<tr>
			<td class="setType"><h3 class="center">{{ Form::checkbox('type', 'lowcarb', null, ['class' => 'setType']) }} Low Carb</h3></td>
			<td class="setType"><h3 class="center">{{ Form::checkbox('type', 'vegetarian', null, ['class' => 'setType']) }} Vegetarian</h3></td>
			<td class="setType"><h3 class="center">{{ Form::checkbox('type', 'glutenfree', null, ['class' => 'setType']) }} Gluten Free</h3></td>
		 </tr>
	</table>
	</div><br><br>

	<!-- Serving Size -->
	{{ Form::select('serving_size', ['1 Person', '1-2 Persons', '3-4 Persons', '5-8 Persons', 'More'], 2) }}<br><br>

	<!-- Kitchen Origin -->
	<table class="kitchen">
		<tr>
			<td><h3 class="center">{{ Form::radio('kitchen', 'african', true) }} African</h3></td>
			<td><h3 class="center">{{ Form::radio('kitchen', 'greek') }} Greek</h3></td>
			<td><h3 class="center">{{ Form::radio('kitchen', 'russian') }} Russian</h3></td>
		</tr>
		<tr>
			<td><h3 class="center">{{ Form::radio('kitchen', 'american') }} American</h3></td>
			<td><h3 class="center">{{ Form::radio('kitchen', 'indonesian') }} Indonesian</h3></td>
			<td><h3 class="center">{{ Form::radio('kitchen', 'south_american') }} South-American</h3></td>
		</tr>
		<tr>
			<td><h3 class="center">{{ Form::radio('kitchen', 'british') }} British</h3></td>
			<td><h3 class="center">{{ Form::radio('kitchen', 'italian') }} Italian</h3></td>
			<td><h3 class="center">{{ Form::radio('kitchen', 'thai') }} Thai</h3></td>
		</tr>
		<tr>
			<td><h3 class="center">{{ Form::radio('kitchen', 'chinese') }} Chinese</h3></td>
			<td><h3 class="center">{{ Form::radio('kitchen', 'japanese') }} Japanese</h3></td>
			<td><h3 class="center">{{ Form::radio('kitchen', 'turkish') }} Turkish</h3></td>
		</tr>
		<tr>
			<td><h3 class="center">{{ Form::radio('kitchen', 'french') }} French</h3></td>
			<td><h3 class="center">{{ Form::radio('kitchen', 'middle_eastern') }} Middle-Eastern</h3></td>
			<td><h3 class="center">{{ Form::radio('kitchen', 'other') }} Other</h3></td>
		</tr>
	</table><br><br>

	<!-- Recipe Instructions -->
	<textarea class="form-control" name="instructions" rows="5" id="instructions" placeholder="Instructions on how to prepare your recipe"></textarea>
	<span class="help-block"></span>
	<!-- <button type="submit" id="submitRecipe">Submit</button> -->
	{{ Form::submit('Submit Recipe', array('id'=>'submitRecipe',  'class' => 'btn btn-default')) }}

{!! Form::close() !!}
@endsection
