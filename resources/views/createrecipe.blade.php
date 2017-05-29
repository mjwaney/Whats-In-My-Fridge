@extends('layouts.app')
@section('title', 'Create Recipe')
@section('p1')
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
	{{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Recipe Title', 'required' => 'required')) }}<br>

	<!-- Type of Recipe --><h2 class="center">Type</h2>
	{{ Form::select('type', ['Breakfast', 'Lunch', 'Dinner', 'Dessert', 'Appetizer', 'Snack', 'Fast Food', 'Side Dish', 'Fast Food', 'Vegetarian', 'Vegan', 'Low Fat', 'Low Carb', 'Gluten Free'], 0, ['class' => 'form-control']) }}
	<br>

	<!-- Serving Size --><h2 class="center">Serving Size</h2>
	{{ Form::select('serving_size', ['1 Person', '1-2 Persons', '3-4 Persons', '5-8 Persons', 'More'], 2, ['class' => 'form-control']) }}
	<br>

	<!-- Kitchen -->
	<h2 class="center">Kitchen</h2>
	{{ Form::select('kitchen', ['Other', 'African', 'American', 'British', 'Chinese', 'French', 'Greek', 'Indonesian', 'Italian', 'Japanese', 'Middle-Eastern', 'Russian', 'South-American', 'Thai', 'Turkish', ''], 0, ['class' => 'form-control']) }}<br> 

	<!-- Recipe Difficulty -->
	<h2 class="center">Recipe Difficulty</h2>
	{{ Form::select('difficulty', ['1', '2', '3', '4', '5'], 2, ['class' => 'form-control']) }}<br> 

	<!-- Recipe Instructions -->
	<h2 class="center">Instructions</h2>
	<textarea class="form-control" name="instructions" rows="5" id="instructions" placeholder="Instructions on how to prepare your recipe"></textarea>
	<span class="help-block"></span>
	<!-- <button type="submit" id="submitRecipe">Submit</button> -->
	{{ Form::submit('Submit Recipe', array('id'=>'submitRecipe',  'class' => 'btn btn-default')) }}

{!! Form::close() !!}
@endsection

<!-- <script>
var logID = 'log',
  log = $('<div id="'+logID+'"></div>');
$('body').append(log);
  $('[type*="radio"]').change(function () {
    var me = $(this);
    log.html(me.attr('value'));
  });
</script> -->
