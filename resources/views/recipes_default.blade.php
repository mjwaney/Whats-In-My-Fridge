@extends('layout.app')

@section('title', 'Recipes') 

@section('p1')
	<div class="panel panel-default">
           		<div class="panel-heading"> Recipe List </div>
		<div class="panel-body">
		<ul class="list-group">
			@foreach($rec as $key=>$r)
			<li class="list-group-item">
	        		<span class="badge">14</span>  
		 		<a color="blue" href="/recipes/{{ $key+1 }}">{{  $rec[$key]->name }}</a>
		 	</li><br> 	
			@endforeach  
		</div>
		</ul>
	</div>
@endsection

@section('p2')
@endsection