<?php 
	use App\Http\Controllers\FindIngredientController; 
	use App\Recipe;
?>

@extends('layouts.app')

@section('title','Profile')

@section('p1')
	<h1 class="center">Profile</h1>
	<div class="panel panel-default">
		<div class="panel-heading clearfix"> <h2 class="center">User Info</h2></div>
		<div class="panel-body">
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

	@isset(Auth::user()->name) 
	<div class="panel panel-default">
		<div class="panel-heading clearfix"> <h2 class="center">Favorites</h2></div>
		@foreach(Auth::user()->favorite(Recipe::class) as $fav)
		<div class="panel-body">
			<a href="recipes/{{ $fav->id }}" >{{ $fav->name }}</a> <br>
			<img src="{{ $fav->image }}"> 
		</div>@endforeach
	</div>@endisset<br><br>
	<?php
		// $user = Auth::user();
		// echo '<pre>';
		// print_r($user);
		// echo '</pre>';
	?>
@endsection

@section('p2')
	@include('partials.selectize') 
@endsection