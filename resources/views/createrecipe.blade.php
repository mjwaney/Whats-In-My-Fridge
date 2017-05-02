<?php 
  use App\Http\Controllers\FindIngredientController; 
  use App\Http\Controllers\CreateRecipeController; 
?>
@extends('layout.app')
@section('title', 'Create Recipe')

@section('p1')
{!! Form::open(array('route' => 'recipe_store', 'class' => 'form')) !!}
{{csrf_field()}}
  <div class="panel panel-default"><!-- Panel -->
    <div class="panel-heading">Create Recipe</div>  
      <div class="panel-body"><!-- Panel Body-->

    <!-- Add Ingredients (uses session and modal) -->
    <div class="form-group">
      <div class="col-lg-7 col-lg-offset-3">
        {{ CreateRecipeController::ingredientSession() }}
        <a data-toggle="modal" href="#myModal2" class="btn btn-default">Add Ingredients</a>
        <!-- {{ Form::submit('Clear Ingredients', array('class' => 'btn btn-default')) }} -->
            <input type="submit" class="btn btn-default" name="clear2" value="Clear Ingredients"><br><br>
        @include('partials.modal') 
      </div>
    </div>

    @isset($returnMsg) {{ $returnMsg }} @endisset
    <!-- Title Input -->
    <div class="form-group">
      <label for="title" class="col-lg-3 control-label">Title</label>
      <div class="col-lg-7">
        {{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Recipe Title', 'required' => 'required')) }}
      </div><br><br><br><br>
    </div>

    <!--  Author Input -->
    <div class="form-group">
      <label for="author" class="col-lg-3 control-label">Author</label>
      <div class="col-lg-7">
        {{ Form::text('author', '', array('class' => 'form-control', 'placeholder' => 'Author Name', 'required' => 'required')) }}
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
      </div><br><br>
    </div>

    <!-- Kitchen Origin -->
    <div class="form-group">
      <label for="kitchen" class="col-lg-3 control-label">Kitchen</label>
      <div class="col-lg-7"><table class="kitchen">
        <tr>
          <label><td>{{ Form::radio('kitchen', 'african', true) }} African</td></label>
          <label><td>{{ Form::radio('kitchen', 'american') }} American</td></label>
          <label><td>{{ Form::radio('kitchen', 'other') }} Other</td></label>
        </tr><tr>
          <label><td>{{ Form::radio('kitchen', 'british') }} British</td></label>
          <label><td>{{ Form::radio('kitchen', 'chinese') }} Chinese</td></label>
        </tr><tr>
          <label><td>{{ Form::radio('kitchen', 'french') }} French</td></label>
          <label><td>{{ Form::radio('kitchen', 'greek') }} Greek</td></label>
        </tr><tr>
          <label><td>{{ Form::radio('kitchen', 'indonesian') }} Indonesian</td></label>
          <label><td>{{ Form::radio('kitchen', 'italian') }} Italian</td></label>
        </tr><tr>
          <label><td>{{ Form::radio('kitchen', 'japanese') }} Japanese</td></label>
          <label><td>{{ Form::radio('kitchen', 'middle_eastern') }} Middle-Eastern</td></label>
        </tr><tr>
          <label><td>{{ Form::radio('kitchen', 'russian') }} Russian</td></label>
          <label><td>{{ Form::radio('kitchen', 'south_american') }} South-American</td></label>
        </tr><tr>
          <label><td>{{ Form::radio('kitchen', 'thai') }} Thai</td></label>
          <label><td>{{ Form::radio('kitchen', 'turkish') }} Turkish</td></label>
        </tr></table><br><br>
      </div>
    </div>

    <!-- Instructions input --><br><br>
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
    </div>
    </div>

{!! Form::close() !!}
@endsection
