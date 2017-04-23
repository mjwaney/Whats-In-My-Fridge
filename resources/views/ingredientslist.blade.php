@extends('layout.app')

@section('title', 'Ingredients List') 

@section('h1title')
    Ingredients
<img src="images/ingredients_banner.png" class="contentImage" />
@endsection

@section('p1')
    

    @foreach($ing as $key=>$r)
 	<br>{{  $ing[$key]->name }}
	@endforeach  
@endsection