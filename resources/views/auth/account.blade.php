<?php 
	use App\Http\Controllers\FindIngredientController; 
	use App\Recipe;
?>

@section('scripts') {!! Html::script('js/user/toggle.js') !!} @endsection
@extends('layouts.app')

@section('title','Profile')

@section('p1')
	<h1 class="center">Profile</h1>
	<div class="panel panel-default">
		<div class="panel-heading clearfix" id="toggleUser"><h2 class="white">User Info</h2></div>
		<div class="panel-body" id="userinfo" style="display:none;">
			<table border="0" style="padding-left: 50px;">
				<tr>
					<td>Username:</td>
					<td>{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>{{ isset(Auth::user()->name) ? Auth::user()->email : Auth::user()->email }}</td>
				</tr>
				<tr>
					<td>Member since:&nbsp;</td>
					<td>{{ isset(Auth::user()->name) ? Auth::user()->created_at : Auth::user()->email }}</td>
				</tr>
			</table><br><br>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading clearfix" id="toggleIngredients"><h2 class="white">Your Ingredients</h2></div>
		<div class="panel-body" id="ingredientsList" style="display:none;">
			@include('partials.selectize')<br><br>
		</div>
	</div>

	@isset(Auth::user()->name) 
	<div class="panel panel-default">
	<div class="panel-heading clearfix" id="toggleFav"><h2 class="white">Favorites</h2></div>
			<div class="panel-body" id="favoriteList" style="display:none;">
				<ul class="list-group">
				@foreach(Auth::user()->favorite(Recipe::class) as $fav)
				<li class="list-group-item">
					<div class="panel-body">
						<a href="recipes/{{ $fav->id }}" >{{ $fav->name }}</a> <br>
						<img src="{{ $fav->image }}"> 
					</div>
				</li>@endforeach
			</ul>
		</div>@endisset<br><br>
@endsection