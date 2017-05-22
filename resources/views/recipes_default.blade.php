@extends('layouts/app')
@section('title', 'Recipes')

@section('fullwidth')
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
</script>

<!-- Container -->
<div class="container">
	<div class="well well-sm">
		<!-- <strong class="pull-right">Display</strong> -->
		<!-- <h2 class="white">Recipes</h2> -->
		<div class="btn-group">
			<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
			</span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
			class="glyphicon glyphicon-th"></span>Grid</a>
		</div>
	</div>	

	<div id="products" class="row list-group">
		
		@foreach($rec as $key=>$r)
		<div class="item col-xs-4 col-lg-4">
			<div class="thumbnail">
				<a class="linkImg" href="recipes/{{ $r->id }}"><img class="group list-group-image" src="{{ $r->image }}" alt="" /></a>
				<div class="caption">
					<h2 class="group inner list-group-item-heading center">{{$r->name}}&nbsp;<br></h1>
					<h3 class="center">Author:&nbsp;{{$r->author}}</h2>
					<p class="group inner list-group-item-text">
					<div class="row clear">
						<h3 class="timestamp center">Added {{$r->created_at->diffForHumans()}}</h3>
							@if (Auth::check())
								{!!Form::open(array('id' => 'favRecipe', 'name' => 'fav', 'route' => 'postFavorite')) !!}
								<button type="submit" name="fav" class="btn btn-default pull-right" id="ad" value="{{ $r->id }}">
								{{ $r->favoritesCount }}&nbsp;<span class="glyphicon glyphicon-star-empty "></span>
								</button>
								{!! Form::close() !!}
							@endif
					</div>
				</div>
			</div>
		</div>
		@endforeach
							
	</div>
</div>
@endsection
