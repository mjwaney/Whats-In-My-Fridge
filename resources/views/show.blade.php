@extends('layouts.app')

@section('title', 'Recipes') 

@section('h1title')
<img src="images/recipes/texmex-burger.jpg" class="contentImage" />
    {{$recipe->name}}              
@endsection

@section('p1')
    {{$recipe->ingredients}} <br>
    {{$recipe->kitchen}} <br>
    {{$recipe->serving_size}}      
@endsection

@section('p2')    
	{{$recipe->instructions}} 
@endsection