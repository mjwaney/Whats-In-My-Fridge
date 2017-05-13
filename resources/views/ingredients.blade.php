@extends('layouts.app')

@section('title', 'Ingredients') 

@section('left')
	<div class="panel panel-default">
		<div class="panel-heading" id="ph1">Top Rated</div>
		<div class="panel-body">Recipe 1</div>
		<div class="panel-body">Recipe 2</div>
		<div class="panel-body">Recipe 3</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading" id="ph2">Top Ingredients</div>
		<div class="panel-body">Butter</div>
		<div class="panel-body">Cheese</div>
		<div class="panel-body">Eggs</div>
	</div>
@endsection

@section('h1title')
    Ingredients
	<img src="contentImages/ingredients_banner.png" class="contentImage" />
@endsection

@section('p1')
    List of ingredients
@endsection

@section('right')
	<div class="panel panel-default">
		<div class="panel-heading" id="ph1">Top Rated</div>
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
		<div class="panel-heading" id="ph2">Top Ingredients</div>
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
@endsection
