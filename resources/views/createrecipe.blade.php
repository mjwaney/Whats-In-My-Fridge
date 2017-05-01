<?php 
  use App\Http\Controllers\FindIngredientController; 
  use App\Http\Controllers\CreateRecipeController; 
?>
@extends('layout.app')
@section('title', 'Create Recipe')

@section('p1')
{!! Form::open(array('route' => 'recipe_store', 'class' => 'form')) !!}
  <fieldset>
    <legend>Create Recipe</legend>

    @isset($returnMsg) {{ $returnMsg }} @endisset
    <!-- Title Input -->
    <div class="form-group">
      <label for="title" class="col-lg-3 control-label">Title</label>
      <div class="col-lg-7">
        {{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Recipe Title')) }}
      </div><br><br>
    </div>

    <!--  Author Input -->
    <div class="form-group">
      <label for="author" class="col-lg-3 control-label">Author</label>
      <div class="col-lg-7">
        {{ Form::text('author', '', array('class' => 'form-control', 'placeholder' => 'Author Name')) }}
      </div><br><br>
    </div>

    <!-- Type of Recipe -->
    <div class="form-group">
      <label for="type" class="col-lg-3 control-label">Type</label>
      <div class="col-lg-7">
        <div class="checkbox">
          <table class="ingredientstable">
          <tr>
            <td><label>{{ Form::checkbox('type', 'snack') }} <span class="nowrap">Snack</span></td>
            <td><label>{{ Form::checkbox('type', 'breakfast') }} <span class="nowrap">Breakfast</span></td>
            <td><label>{{ Form::checkbox('type', 'lunch') }} <span class="nowrap">Lunch</span></td>
            <td><label>{{ Form::checkbox('type', 'dinner') }} <span class="nowrap">Dinner</span></td>
          </tr>
          <tr>
            <td><label>{{ Form::checkbox('type', 'dessert') }} <span class="nowrap">Dessert</span></td>
            <td><label>{{ Form::checkbox('type', 'sidedish') }} <span class="nowrap">Side Dish</span></td>
            <td><label>{{ Form::checkbox('type', 'fastfood') }} <span class="nowrap">Fast Food</span></td>
            <td><label>{{ Form::checkbox('type', 'vegan') }}  <span class="nowrap">Vegan</span></td>
          </tr>
          <tr>
            <td><label>{{ Form::checkbox('type', 'lowfat') }} <span class="nowrap">Low Fat</span></td>
            <td><label>{{ Form::checkbox('type', 'lowcarb') }} <span class="nowrap">Low Carb</span></td>
            <td><label>{{ Form::checkbox('type', 'vegetarian') }}  <span class="nowrap">Vegetarian</span></td>
            <td><label>{{ Form::checkbox('type', 'glutenfree') }} <span class="nowrap">Gluten Free</span></td>
          </tr>
          </table>
        </div><br><br>
      </div>
    </div>
      
    <!-- Serving Size -->
    <div class="form-group">
      <label for="serving_size" class="col-lg-3 control-label">Serving Size</label>
      <div class="col-lg-7">
        {{ Form::select('serving_size', ['1 Person', '1-2 Persons', '3-4 Persons', '5-8 Persons', 'More'], 2) }}<br><br>
      </div>
    </div>

    <!-- Kitchen Origin -->
    <div class="form-group">
      <label for="kitchen" class="col-lg-3 control-label">Kitchen</label>
      <div class="col-lg-7">
        <div class="radio"><label>{{ Form::radio('kitchen', 'african', true) }}African</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'american') }}American</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'british') }}British</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'chinese') }}Chinese</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'french') }}French</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'greek') }}Greek</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'indonesian') }}Indonesian</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'italian') }}Italian</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'japanese') }}Japanese</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'middle_eastern') }}Middle-Eastern</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'russian') }}Russian</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'south_american') }}South-American</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'thai') }}Thai</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'turkish') }}Turkish</label></div>
        <div class="radio"><label>{{ Form::radio('kitchen', 'other') }}Other</label></div>
      </div><br><br>
    </div>

    <!-- Add Ingredients (uses session and modal) -->
    <div class="form-group">
      <div class="col-lg-7 col-lg-offset-3">
        {{ CreateRecipeController::ingredientSession() }}
        <a data-toggle="modal" href="#myModal2" class="btn btn-default">Add Ingredients</a>
        <!-- {{ Form::submit('Clear Ingredients', array('class' => 'btn btn-default')) }} -->
        <form action="" method="get" >
            <input type="submit" class="btn btn-default" name="clear2" value="Clear Ingredients">
        </form><br><br>
        @include('partials.modal') 
      </div>
    </div>

    <!-- Instructions input -->
    <div class="form-group">
      <label for="instructions" class="col-lg-3 control-label" >Instructions</label>
      <div class="col-lg-7">
        <textarea class="form-control" name="instructions" rows="3" id="instructions" placeholder="Instructions on how to prepare your recipe"></textarea>
        <span class="help-block"></span>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-lg-3 control-label" ></label>
      <div class="col-lg-7">
        {{ Form::submit('Submit Recipe', array('class' => 'btn btn-default')) }}
      </div>
    </div>

  </fieldset>
{!! Form::close() !!}
@endsection
