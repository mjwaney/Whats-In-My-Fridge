@extends('layout.app')

@section('title', 'Recipes') 

@section('h1title')
    @isset($recipe)
    	{{$recipe->name}} <br><br>
    @endisset
    <img src="{{asset('images/recipes/texmex-burger.jpg')}}" class="contentImage" />              
@endsection

@section('p1')
@isset($recipe)
    Ingredients: {{$recipe->ingredients}} <br>
    Kitchen: {{$recipe->kitchen}} <br>
    Serving Size: {{$recipe->serving_size}}     
    @endisset 
@endsection

@section('p2')  
@isset($recipe)
	Instructions:<br><br>{{$recipe->instructions}} 
	@endisset
@endsection