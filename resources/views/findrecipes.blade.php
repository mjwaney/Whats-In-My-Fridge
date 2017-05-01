<?php use App\Http\Controllers\FindIngredientController; ?>

@extends('layout.app')
@section('title', 'Find Recipes') 

@section('p1')
{!! Form::open(array('route' => 'recipe_query', 'class' => 'form'))  !!}
<div class="containerN"> <!-- Container for Panel -->
  <div class="panel panel-default"><!-- Panel -->
    <div class="panel-heading">Find recipes </div>  
      <div class="panel-body"><!-- Panel Body-->
        <div class="form-group">
            <label for="select" class="col-lg-4 control-label">What's In your fridge?</label>
              <div class="col-lg-6">
                    {{ FindIngredientController::ingredientSession() }}
                <ul class="list-group">
                <a data-toggle="modal" href="#myModal2" class="btn btn-default">Add Ingredient</a><br><br>
                        <form action="" method="get" >
                            <input type="submit" class="btn btn-default" name="clear" value="Clear Ingredients">
                        </form><br><br>
                      <!-- <input type="submit" class="btn btn-default" name="find" value="Find Recipe"> -->
                      @include('partials.modal')
                  {{ Form::submit('Find Recipes', array('class' => 'btn btn-default')) }}
              </div><!-- Close Col-lg-2-->
        </div><!-- Close Form-Group-->
      </div><!-- Close Panel Body-->
  </div> <!-- Close Panel -->
</div><!-- Close Container for Panel -->
{!! Form::close() !!}
@endsection

@section('p2')
<div class="containerN"> <!-- Container for Panel -->
  <div class="panel panel-default"><!-- Panel -->
    <div class="panel-heading">Search Results </div>  
      <div class="panel-body"><!-- Panel Body-->
        <div class="form-group">
          <ul>
            @isset($recipeResult)
              @foreach($recipeResult as $r)
                <li class="list-group-item">
                  <span class="badge">85</span><a color="blue" href="/recipes/{{ $r->id }}">{{ $r->name }}</a>
                </li><br>   
              @endforeach
            @endisset
          </ul>
        </div>
      </div>
  </div>
</div>
@endsection