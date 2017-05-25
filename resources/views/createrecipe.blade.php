@extends('layouts.app')
@section('title', 'Create Recipe')
@section('p1')
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<h1 class="center">Add a Recipe - {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</h2><br>

<!-- Add Ingredients -->
<div class="panel panel-default">
	<div class="panel-heading clearfix" id="toggleSearch"><h2 class="white">Recipe Ingredients<span class="glyphicon glyphicon-chevron-down pull-right"></h2></div>
	<div class="panel-body" id="searchToggle" style="display:none;">
		@include('partials.selectize')<br><br>
	</div>
</div>

<!-- Image upload -->
<div class="panel panel-default">
	<div class="panel-heading clearfix" id="toggleImage"><h2 class="white">Upload an Image<span class="glyphicon glyphicon-chevron-down pull-right"></h2></div>
	<div class="panel-body" id="imageToggle" style="display:none;">
		@include('partials.resizeImage') <br><br>
	</div>
</div>

{!! Form::open(array('id'=>'createRecipe', 'route' => 'postStore')) !!}

	<!-- Title Input -->
	<h2 class="center">Title</h2>
	{{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Recipe Title', 'required' => 'required')) }}<br><br>

	<!-- Type of Recipe -->
	<div >
	<table class="typeTable"><h2 class="center">Type</h2>
		<tr>
			<td class="setType">{{ Form::checkbox('type', 'snack', null) }} Snack</td>
			<td class="setType"> {{ Form::checkbox('type', 'breakfast', null) }} Breakfast</td>
			<td class="setType"> {{ Form::checkbox('type', 'lunch', null)}} Lunch</td>
		</tr>
		<tr>
			<td class="setType">{{ Form::checkbox('type', 'dinner', null, ['class' => 'setType']) }} Dinner</td>
			<td class="setType">{{ Form::checkbox('type', 'dessert', null, ['class' => 'setType']) }} Dessert</td>
			<td class="setType">{{ Form::checkbox('type', 'sidedish', null, ['class' => 'setType']) }} Side Dish</td>
		</tr>
		<tr>
			<td class="setType">{{ Form::checkbox('type', 'fastfood', null, ['class' => 'setType']) }} Fast Food</td>
			<td class="setType">{{ Form::checkbox('type', 'vegan', null, ['class' => 'setType']) }} Vegan</td>
			<td class="setType">{{ Form::checkbox('type', 'lowfat', null, ['class' => 'setType']) }} Low Fat</td>
		</tr>
		<tr>
			<td class="setType">{{ Form::checkbox('type', 'lowcarb', null, ['class' => 'setType']) }} Low Carb</td>
			<td class="setType">{{ Form::checkbox('type', 'vegetarian', null, ['class' => 'setType']) }} Vegetarian</td>
			<td class="setType">{{ Form::checkbox('type', 'glutenfree', null, ['class' => 'setType']) }} Gluten Free</td>
		 </tr>
	</table>
	</div><br><br>

	<!-- Serving Size --><h2 class="center">Serving Size</h2>
	{{ Form::select('serving_size', ['1 Person', '1-2 Persons', '3-4 Persons', '5-8 Persons', 'More'], 2) }}<br><br>

	<!-- Kitchen Origin -->
	<table class="kitchen"><h2 class="center">Kitchen</h2>
		<tr>
			<td>{{ Form::radio('kitchen', 'african', true) }} African</td>
			<td>{{ Form::radio('kitchen', 'greek') }} Greek</td>
			<td>{{ Form::radio('kitchen', 'russian') }} Russian</td>
		</tr>
		<tr>
			<td>{{ Form::radio('kitchen', 'american') }} American</td>
			<td>{{ Form::radio('kitchen', 'indonesian') }} Indonesian</td>
			<td>{{ Form::radio('kitchen', 'south_american') }} South-American</td>
		</tr>
		<tr>
			<td>{{ Form::radio('kitchen', 'british') }} British</td>
			<td>{{ Form::radio('kitchen', 'italian') }} Italian</td>
			<td>{{ Form::radio('kitchen', 'thai') }} Thai</td>
		</tr>
		<tr>
			<td>{{ Form::radio('kitchen', 'chinese') }} Chinese</td>
			<td>{{ Form::radio('kitchen', 'japanese') }} Japanese</td>
			<td>{{ Form::radio('kitchen', 'turkish') }} Turkish</td>
		</tr>
		<tr>
			<td>{{ Form::radio('kitchen', 'french') }} French</td>
			<td>{{ Form::radio('kitchen', 'middle_eastern') }} Middle-Eastern</td>
			<td>{{ Form::radio('kitchen', 'other') }} Other</td>
		</tr>
	</table><br><br>

	<!-- Recipe Instructions -->
	<h2 class="center">Instructions</h2>
	<textarea class="form-control" name="instructions" rows="5" id="instructions" placeholder="Instructions on how to prepare your recipe"></textarea>
	<span class="help-block"></span>
	<!-- <button type="submit" id="submitRecipe">Submit</button> -->
	{{ Form::submit('Submit Recipe', array('id'=>'submitRecipe',  'class' => 'btn btn-default')) }}

{!! Form::close() !!}
@endsection
