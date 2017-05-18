<?php 
	use App\Http\Controllers\FindIngredientController; 
?>

@extends('layouts.app')

@section('title', 'Find Recipes') 

@section('left')
	&nbsp
@endsection

@section('p1')
	@include('partials.selectize') 
@endsection

@section('p2')
	<div class="panel panel-default"><!-- Panel -->
		<div class="panel-heading"><h2 class="center">
			Search Results </h2>
		</div>  
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
