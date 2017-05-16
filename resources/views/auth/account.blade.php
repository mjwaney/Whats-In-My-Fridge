<?php 
	use App\Http\Controllers\FindIngredientController; 
?>

@extends('layouts.app')

@section('title','Profile')

@section('p1')
	<h1 class="center">Profile</h1>
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
		<tr>
			<td>Favorites:</td>
			<td>@isset(Auth::user()->name) {{ Auth::user()->favorite(Recipe::class) }} @endisset </td>
		</tr>
	</table>
	{!! Form::open(array('route' => 'recipe_query', 'class' => 'form'))  !!}
	<div class="panel panel-default"><!-- Panel -->
		<div class="panel-heading">Add Ingredients</div>  
			<div class="panel-body"><!-- Panel Body-->
				<div class="form-group">
					{{ FindIngredientController::ingredientSession() }}
					@include('partials.selectize') 
					<ul class="list-group">
								<!-- <input type="submit" class="btn btn-default" name="find" value="Find Recipe"> -->
				</div><!-- Close Form-Group-->
			</div><!-- Close Panel Body-->
	</div> <!-- Close Panel -->
{!! Form::close() !!}
	<?php
		$user = Auth::user();
		echo '<pre>';
		// print_r($user);
		echo '</pre>';
	?>
@endsection

@section('bodyend')
@endsection