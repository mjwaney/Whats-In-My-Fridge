@extends('layouts.app')

@section('title', 'Recipes') 

@section('p1')
<div class="panel panel-default">
	<div class="panel-heading">Recipe List	</div>
	<div class="panel-body">
		<ul class="list-group">
		@foreach($rec as $key=>$r)
			<li class="list-group-item">
				@if (Auth::check())
					{!!Form::open(array('id' => 'favRecipe', 'name' => 'fav', 'route' => 'postFavorite')) !!}
					<button type="submit" name="fav" class="btn btn-default pull-right" id="ad" value="{{ $r->id }}">
					{{ $r->favoritesCount }}&nbsp;<span class="glyphicon glyphicon-star-empty "></span>
					</button>
					{!! Form::close() !!}
				@endif
				<span class="pull-right">{{$r->created_at->diffForHumans()}}&nbsp;&nbsp;</span><a color="blue" href="/recipes/{{ $r->id }}">{{  $r->name }}</a><br><img src="{{ $r->image }}">
			</li><br> 	
		@endforeach  
		</ul>
	</div>
</div>
@endsection