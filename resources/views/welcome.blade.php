@extends('layouts.app')

@section('title','Home')

@section('left')
		<div class="column left">
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
		</div>
@endsection

@section('p1')
	<!-- <div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Dashboard
					</div>

					<div class="panel-body">
						You are logged in!
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<h1 class="center" style="display: flex; justify-content: center;">Welcome to What's In My Fridge!</h1>
@endsection

@section('right')
		<div class="column right">

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
		</div>@endsection