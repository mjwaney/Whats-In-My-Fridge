<?php 
   use App\Http\Controllers\FindIngredientController; 
   use App\Http\Controllers\CreateRecipeController; 
?>

@extends('layouts.app')
@section('title', 'Create Recipe')
@section('p1')
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>
<script type="text/javascript">
   var root = '{{url("/createrecipe")}}';
</script>
<script>
var list = [];
$(document).ready(function()
{

   $('#searchbox').selectize({
      valueField: 'name',
      labelField: 'name',
      searchField: ['name'],
      options: [],
      create: false,
      highlight: false,
      optgroups: [
         {value: 'ingredient', label: 'Ingredients'},
         {value: 'category', label: 'Categories'}
      ],
      optgroupField: 'class',
      optgroupOrder: ['ingredients','categories'],
      load: function(query, callback) 
      {
         if (!query.length) return callback();
         $.ajax({
            url: root+'/api/search?q=xxxx',
            type: 'GET',
            dataType: 'json',
            data: 
            {
               q: query
            },
            error: function() 
            {
               callback();
            },
            success: function(res) 
            {
               callback(res.data);
            }
         });
      },
      onChange: function()
      {
         // window.location = this.items[0];
      },

      onItemAdd(value, $item)
      {
         list.push(value);
         window.value = value;
         document.getElementById("ingpanel").innerHTML += '<li class="list-group-item"><form action="" method="get">' + value + '<input type="submit" class="close" data-dismiss="list-group" aria-hidden="true" name="' + value + '" value="&times;">';  

         list.forEach(outputHidden);

         function outputHidden(item, index)
         {
            document.getElementById("ingpanel").innerHTML += '<input type="hidden" name="ing" value="' + item + '">';
         }
         
      }
   });
});
</script>
<script>
$(function () 
{
   $('#ingList').on('submit', function (e) 
   {
      e.preventDefault();

       $.ajax
       ({
            type: 'post',
            url: 'ingList',
            // contentType: 'application/json',
            // dataType: 'json',
            data: {value: value},
            // async: false,
            // data: $('form').serialize(),
            success: function (res) 
            {
               alert('Ingredients Added');
            },
      });
   });
});
</script>

<div class="panel panel-default"><!-- Panel -->
   <div class="panel-heading">Create Recipe</div>  
   <div class="panel-body"><!-- Panel Body-->

      <div class="form-group">
         <div class="col-lg-7 col-lg-offset-3">
            <div class="panel panel-default"><!-- Panel -->
            <div class="panel-heading">Add Ingredients<a data-toggle="modal" href="#myModal2"><i class="fa fa-plus pull-right"></i></a></div>
            <div class="panel-body">
               <select id="searchbox" name="q" placeholder="Search ingredients..." class="form-control"></select>
            </div> 
            <div class="panel-body"><!-- Panel Body-->
               {{ CreateRecipeController::ingredientSession() }}

               <!-- {!! Form::open(array('id' => 'ingList')) !!} -->
               {!! Form::open(array('id' => 'ingList', 'name' => 'ing', 'route' => 'postIngList')) !!}
                  <div id="ingpanel"></div><br>
                  {{ Form::submit('Add Ingredients', array('class' => 'btn btn-default')) }}
               {!! Form::close() !!}
            </div>
            </div>
         </div>
      </div><br><br>

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
            {{ Form::text('author', '', array('class' => 'form-control', 'placeholder' => 'Author Name', 'required' => 'required')) }}<br><br>
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
