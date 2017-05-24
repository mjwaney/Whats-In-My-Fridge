@extends('layouts.app')

@section('title', 'Find Recipes') 

@section('left')
	&nbsp;
@endsection

@section('p1')
	@include('partials.selectize') 
@endsection

@section('p2')
	<div class="panel panel-default" id="searchresults" style="display:none;"><!-- Panel -->
		<div class="panel-heading"><h2 class="white">
			Search Results </h2>
		</div>  
			<div class="panel-body"><!-- Panel Body-->
				<div class="form-group" id="results">
				</div>
			</div>
	</div>
@endsection
