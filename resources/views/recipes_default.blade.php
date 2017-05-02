@extends('layout.app')
@section('title', 'Recipes - What\'s In My Fridge') 

@section('p1')
<div class="panel panel-default">
<div class="panel-heading"> Recipe List </div>
<div class="panel-body">
	<ul class="list-group">
		@foreach($rec as $key=>$r)
			<li class="list-group-item">
				<span class="pull-right">{{$r->created_at->diffForHumans()}}</span><a color="blue" href="/recipes/{{ $r->id }}">{{  $r->name }}</a>
			</li><br> 	
		@endforeach  
	</ul>
</div>
</div>
@endsection