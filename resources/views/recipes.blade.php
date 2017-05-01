@extends('layout.app')
@section('title', 'Recipes') 
@section('p1')
        <div class="panel panel-default">
                <div class="panel-heading"> 
                    @isset($recipe) {{$recipe->name}} @endisset<br><br>
                    <img height="300" width="auto" src="{{asset('images/recipes/texmex-burger.jpg')}}" class="contentImage" />  
                </div>
            @isset($recipe)
                <div class="panel-body">
                    Author: {{$recipe->author}} <br><br>
                    Ingredients: <br>@foreach($recipe->ingredients as $r) <br> {{$r->name}} @endforeach<br><br>
                    Kitchen: {{$recipe->kitchen}} <br><br>
                    Serving Size: {{$recipe->serving_size}}    
            @endisset 
            @endsection

            @section('p2')  
            @isset($recipe)
                    <div class="panel-body">
            	Instructions:<br><br>
                        {{$recipe->instructions}} 
                        </div>
                        <a href="#" class="btn btn-default">Save Recipe</a>
                </div>
            @endisset
            @endsection