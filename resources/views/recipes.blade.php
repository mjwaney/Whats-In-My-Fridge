@extends('layouts.app')
@section('title', 'Recipes') 
@section('p1')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>
 <script type="text/javascript">
		var root = '{{url("/")}}';
 </script>   
 <script type="text/javascript"> 
$(function()
{

	 $('#ad').on('click', function (e)
	 {
		// e.preventDefault();

		var value = $(this).attr('value');
		// alert(value);

		 $.ajax
		 ({
			type: 'post',
			url: 'addToFavorites',
			data: { 'value': value },
			async: false,
			data: $('form').serialize(),
			success: function (res) 
			{
				 alert('Recipe Added to favorites');
			},
		});

	});
});
</script>
<div class="panel panel-default">
	<div class="panel-heading clearfix"> 
		@isset($recipe) <h2 class="white">{{$recipe->name}}</h2>
		@if (Auth::check())			{!!Form::open(array('id' => 'favRecipe', 'name' => 'fav', 'route' => 'postFavorite')) !!}
			<button type="submit" name="fav" class="btn btn-default pull-right" id="fav" value="{{ $recipe->id }}">
			{{ $recipe->favoritesCount }}&nbsp;<span class="glyphicon glyphicon-cutlery"></span>
			</button>
			{!! Form::close() !!}
		@endif
		@endisset
	</div>

		@isset($recipe)
		<div class="panel-body">
			<img src="{{ $recipe->image }}"> <br><br>
			Author: {{$recipe->author}} <br><br>
			Difficulty: {{$recipe->difficulty}}/5<br><br>
			Ingredients: <br>@foreach($recipe->ingredients as $r) <br> {{$r->name}} @endforeach<br><br>
			Kitchen: {{$recipe->kitchen}} <br><br>
			Serving Size: {{$recipe->serving_size}}    
		</div>
		@endisset 
		@endsection

		@section('p2')  
		@isset($recipe)
		<div class="panel-heading"><h2 class="white">Instructions</h2></div>
		<div class="panel-body">{{$recipe->instructions}}</div>
</div>
@endisset
@endsection
