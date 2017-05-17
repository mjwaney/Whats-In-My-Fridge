<?php 
   use App\Http\Controllers\FindIngredientController; 
   use App\Http\Controllers\CreateRecipeController; 
?>

@extends('layouts.app')
@section('title', 'Create Recipe')
@section('p1')
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>
@include('partials.selectize') 

      <!-- Image upload -->
      @include('partials.resizeImage') 

      {!! Form::open(array('route' => 'recipe_store', 'class' => 'form')) !!}{{csrf_field()}}
      <!-- Title Input -->
      <div class="form-group">
         <label for="title" class="col-lg-3 control-label">Title</label>
         <div class="col-lg-7">
            {{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Recipe Title', 'required' => 'required')) }}<br><br>
         </div>
      </div>

      <!--  Author Input -->
      <div class="form-group">
         <label for="author" class="col-lg-3 control-label">Author</label>
         <div class="col-lg-7">
            {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}<br><br>
         </div>
      </div>

      <!-- Type of Recipe -->
      <div class="form-group">
         <label for="type" class="col-lg-3 control-label">Type</label>
         <div class="col-lg-7">
            <div class="checkbox">
               <table>
                  <tr>
                     <td class="setType"> {{ Form::checkbox('type', 'snack', null) }} Snack</td>
                     <td class="setType"> {{ Form::checkbox('type', 'breakfast', null) }} Breakfast</td>
                     <td class="setType"> {{ Form::checkbox('type', 'lunch', null)}} Lunch</td>
                  </tr>
                  <tr>
                     <td class="setType">{{ Form::checkbox('type', 'dinner', null, ['class' => 'setType']) }} Dinner</td>
                     <td class="setType">{{ Form::checkbox('type', 'dessert', null, ['class' => 'setType']) }} Dessert</td>
                     <td class="setType">{{ Form::checkbox('type', 'sidedish', null, ['class' => 'setType']) }} Side Dish</td>
                  </tr>
                  <tr>
                     <td class="setType">{{ Form::checkbox('type', 'fastfood', null, ['class' => 'setType']) }} Fast Food</td>
                     <td class="setType">{{ Form::checkbox('type', 'vegan', null, ['class' => 'setType']) }} Vegan</td>
                     <td class="setType">{{ Form::checkbox('type', 'lowfat', null, ['class' => 'setType']) }} Low Fat</td>
                  </tr>
                  <tr>
                     <td class="setType">{{ Form::checkbox('type', 'lowcarb', null, ['class' => 'setType']) }} Low Carb</td>
                     <td class="setType">{{ Form::checkbox('type', 'vegetarian', null, ['class' => 'setType']) }} Vegetarian</td>
                     <td class="setType">{{ Form::checkbox('type', 'glutenfree', null, ['class' => 'setType']) }} Gluten Free</td>
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
         <table class="kitchen"><tr>
               <td>{{ Form::radio('kitchen', 'african', true) }} African</td>
               <td>{{ Form::radio('kitchen', 'american') }} American</td>
               <td>{{ Form::radio('kitchen', 'other') }} Other</td>
            </tr><tr>
               <td>{{ Form::radio('kitchen', 'british') }} British</td>
               <td>{{ Form::radio('kitchen', 'chinese') }} Chinese</td>
            </tr><tr>
               <td>{{ Form::radio('kitchen', 'french') }} French</td>
               <td>{{ Form::radio('kitchen', 'greek') }} Greek</td>
            </tr><tr>
               <td>{{ Form::radio('kitchen', 'indonesian') }} Indonesian</td>
               <td>{{ Form::radio('kitchen', 'italian') }} Italian</td>
            </tr><tr>
               <td>{{ Form::radio('kitchen', 'japanese') }} Japanese</td>
               <td>{{ Form::radio('kitchen', 'middle_eastern') }} Middle-Eastern</td>
            </tr><tr>
               <td>{{ Form::radio('kitchen', 'russian') }} Russian</td>
               <td>{{ Form::radio('kitchen', 'south_american') }} South-American</td>
            </tr><tr>
               <td>{{ Form::radio('kitchen', 'thai') }} Thai</td>
               <td>{{ Form::radio('kitchen', 'turkish') }} Turkish</td>
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
      {!! Form::close() !!}
   </div><!-- Panel Body-->
</div><!-- Panel -->
@endsection

@section('bodyend')
   <!-- Add Ingredients (uses session and modal) -->
   @include('partials.modal') 
@endsection
