<?php use App\Recipe; ?>

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
					<td>Member since: </td>
					<td>{{ isset(Auth::user()->name) ? Auth::user()->created_at : Auth::user()->email }}</td>
				</tr>
			</table><br><br>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading clearfix " id="toggleIng"><h2 class="white">Your Fridge<span class="glyphicon glyphicon-chevron-down pull-right"></span></h2></div>
		<div class="panel-body" id="ingList" style="display:none;">
		<table>
			<th class="fridgetable"><h2 class="group inner list-group-item-heading center">Contents</h2></th>
			<th class="fridgetable"><h2 class="group inner list-group-item-heading center">Expires on:</h2></th>
				@foreach($userIng as $ing)
					<tr>
						<td class="fridgetable">{{ $ing->name }}</h2></td>
						<td class="fridgetable">
							<div class="input-group date" data-provide="datepicker">
							    <input type="text" class="form-control">
							    <div class="input-group-addon">
							        <span class="glyphicon glyphicon-th"></span>
							    </div>
							</div>
						</td>
						<td class="fridgetable">
							<button type="button" id="exp" class="btn btn-default">Set Date</button>
						</td>
						<td class="fridgetable">
							<button type="button" id="del" class="btn btn-default">Remove</button>
						</td>
					</tr>
				@endforeach
		</table><br><button type="button" id="fridgerec" class="btn btn-default">Find Recipes</button><br><br>
			@include('partials.selectize') <br><br>
			
			{!! Form::open(array('id'=>'accountIngredients', 'route' => 'postFridge')) !!}
				{{ Form::submit('Update Fridge', array('id'=>'submitFridge',  'class' => 'btn btn-default')) }}
			{!! Form::close() !!}
		</div>
		
	</div>

	<div class="panel panel-default">
		<div class="panel-heading clearfix " id="toggleUserRecipes"><h2 class="white">Your Recipes<span class="glyphicon glyphicon-chevron-down pull-right"></span></h2></div>
		<div class="panel-body" id="userRecipeList" style="display:none;">
			@foreach($userRec as $key=>$r)
				<h2 class="group inner list-group-item-heading center"><a href="recipes/{{ $r->id }}">{{$r->name}}</a><br></h2>
			@endforeach	<br><br>
		</div>
	</div>
	
	@isset(Auth::user()->name) 
	<div class="panel panel-default">
	<div class="panel-heading clearfix" id="toggleFav"><h2 class="white">Your Favorites<span class="glyphicon glyphicon-chevron-down pull-right"></h2></div>
			<div class="panel-body" id="favoriteList" style="display:none;">
				<ul class="list-group">
				@foreach(Auth::user()->favorite(Recipe::class) as $fav)
					<li class="list-group-item">
						<div class="panel-body">
							<a href="recipes/{{ $fav->id }}" >{{ $fav->name }}</a> <br>
							<img src="{{ $fav->image }}"> 
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	@endisset<br><br>

@endsection

<script>
$('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});
</script>
