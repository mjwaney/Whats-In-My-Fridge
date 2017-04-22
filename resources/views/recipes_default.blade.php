@extends('layout.app')

@section('title', 'Recipes') 

@section('h1title')    
	Recipe List     
@endsection

@section('p1')
	@foreach($rec as $key=>$r)
	 	<a color="blue" href="/recipes/{{ $key+1 }}">{{  $rec[$key]->name }}</a><br>
	@endforeach  
@endsection

@section('p2')
@endsection