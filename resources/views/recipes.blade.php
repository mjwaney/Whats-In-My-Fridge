@extends('layout.app')
@section('title', 'Recipes') 
@section('p1')
        <div class="panel panel-default">
            <div class="panel-heading"> 
                @isset($recipe)
                    {{$recipe->name}}<br><br>
                @endisset

                <img height="300" width="auto" src="{{asset('images/recipes/texmex-burger.jpg')}}" class="contentImage" />  

            </div>
            @isset($recipe)
            <div class="panel-body">                 
                Ingredients: {{$recipe->ingredients}} <br>
                Kitchen: {{$recipe->kitchen}} <br>
                Serving Size: {{$recipe->serving_size}}    
            </div> 
            @endisset 
            @endsection

            @section('p2')  
            @isset($recipe)
                    <div class="panel-body">
            	Instructions:<br><br>
                        {{$recipe->instructions}} 
                        </div>
                        <a href="#" class="btn btn-primary">Save Recipe</a>
                </div>
            @endisset
            @endsection