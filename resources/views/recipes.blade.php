@extends('layouts.app')
@section('title', 'Recipes') 
@section('p1')
<div class="panel panel-default">
    <div class="panel-heading"> 
        @isset($recipe) {{$recipe->name}} @endisset
    </div>
    @isset($recipe)
    <div class="panel-body">
        <img src="{{ $recipe->image }}"> <br><br>
        Author: {{$recipe->author}} <br><br>
        Ingredients: <br>@foreach($recipe->ingredients as $r) <br> {{$r->name}} @endforeach<br><br>
        Kitchen: {{$recipe->kitchen}} <br><br>
        Serving Size: {{$recipe->serving_size}}    
    </div>
    @endisset 
    @endsection

    @section('p2')  
    @isset($recipe)
    <div class="panel-heading">Instructions</div>
    <div class="panel-body">{{$recipe->instructions}}</div>
    <a href="#" class="btn btn-default">Save Recipe</a>
</div>
    @endisset
    @endsection
    