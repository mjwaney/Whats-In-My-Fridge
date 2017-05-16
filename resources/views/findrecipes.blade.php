<?php 
	use App\Http\Controllers\FindIngredientController; 
?>

@extends('layouts.app')

@section('title', 'Find Recipes') 

@section('left')
	&nbsp
@endsection

@section('p1')
{!! Form::open(array('route' => 'recipe_query', 'class' => 'form'))  !!}
	<div class="panel panel-default"><!-- Panel -->
		<div class="panel-heading">Find recipes </div>  
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
@endsection

@section('p2')
	<div class="panel panel-default"><!-- Panel -->
		<div class="panel-heading">Search Results </div>  
			<div class="panel-body"><!-- Panel Body-->
				<div class="form-group">
					<ul>
						@isset($recipeResult)
							@foreach($recipeResult as $r)
								<li class="list-group-item">
									<span class="badge">85</span><a color="blue" href="/recipes/{{ $r->id }}">{{ $r->name }}</a>
								</li><br>   
							@endforeach
						@endisset
					</ul>
				</div>
			</div>
	</div>
@endsection
@section('bodyend')
	@include('partials.modal')
@endsection
