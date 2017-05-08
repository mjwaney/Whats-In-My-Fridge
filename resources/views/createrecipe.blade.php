<?php 
  use App\Http\Controllers\FindIngredientController; 
  use App\Http\Controllers\CreateRecipeController; 
?>
@extends('layout.app')
@section('title', 'Create Recipe')

@section('p1')
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>
<script type="text/javascript">
    var root = '{{url("/createrecipe")}}';
</script>
<script>
$(document).ready(function(){
    $('#searchbox').selectize({
        valueField: 'name',
        labelField: 'name',
        searchField: ['name'],
        // maxOptions: 10,  
        options: [],
        create: false,
        highlight: false,
        // maxItems: 20,
        // render: {
        //     option: function(item, escape) {
        //         return '<div><img src="'+ item.icon +'">' +escape(item.name)+'</div>';
        //     }
        // },
        optgroups: [
            {value: 'ingredient', label: 'Ingredients'},
            {value: 'category', label: 'Categories'}
        ],
        optgroupField: 'class',
        optgroupOrder: ['ingredients','categories'],
        load: function(query, callback) {
            if (!query.length) return callback();
            $.ajax({
                url: root+'/api/search?q=xxxx',
                type: 'GET',
                dataType: 'json',
                data: {
                    q: query
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res.data);
                }
            });
        },
        onChange: function(){
            // window.location = this.items[0];
        },

        onItemAdd(value, $item){
          document.getElementById("ingpanel").innerHTML += '<li class="list-group-item"><form action="" method="get">' + value + '<input type="submit" class="close" data-dismiss="list-group" aria-hidden="true" name="' + value + '" value="&times;">';
        }
        
    });
});
</script>
  
  <div class="panel panel-default"><!-- Panel -->
    <div class="panel-heading">Create Recipe</div>  
      <div class="panel-body"><!-- Panel Body-->

    <!-- Add Ingredients (uses session and modal) -->
    <div class="form-group">
      <div class="col-lg-7 col-lg-offset-3">
        <div class="panel panel-default"><!-- Panel -->
          <div class="panel-heading">Add Ingredients<a data-toggle="modal" href="#myModal2"><i class="fa fa-plus pull-right"></i></a>
          </div>
          <div class="panel-body">
            <select id="searchbox" name="q" placeholder="Search ingredients..." class="form-control"></select>
          </div> 
          <div class="panel-body"><!-- Panel Body-->
            {{ CreateRecipeController::ingredientSession() }}
            <div id="ingpanel"></div>
            {!! Form::open(array('route' => 'recipe_clear', 'class' => 'form'))  !!}<br><br>
            <input type="submit" class="btn btn-default" name="clear2" value="Clear All">
            {!! Form::close() !!}
            @include('partials.modal') 
          </div>
        </div>
      </div>
    </div><br><br>

     @include('partials.resizeImage') 
      {{Session::get('imagename')}}
    
    {!! Form::open(array('url' => '/recipe _store', 'class' => 'form')) !!}
    {{csrf_field()}}
    <!-- Add Ingredients (uses session and modal) -->

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
            <td>{{ Form::checkbox('type', 'snack') }} <span class="nowrap">Snack</span></td>
            <td>{{ Form::checkbox('type', 'breakfast') }} <span class="nowrap">Breakfast</span></td>
            <td>{{ Form::checkbox('type', 'lunch') }} <span class="nowrap">Lunch</span></td>
            <td>{{ Form::checkbox('type', 'dinner') }} <span class="nowrap">Dinner</span></td>
          </tr>
          <tr>
            <td>{{ Form::checkbox('type', 'dessert') }} <span class="nowrap">Dessert</span></td>
            <td>{{ Form::checkbox('type', 'sidedish') }} <span class="nowrap">Side Dish</span></td>
            <td>{{ Form::checkbox('type', 'fastfood') }} <span class="nowrap">Fast Food</span></td>
            <td>{{ Form::checkbox('type', 'vegan') }}  <span class="nowrap">Vegan</span></td>
          </tr>
          <tr>
            <td>{{ Form::checkbox('type', 'lowfat') }} <span class="nowrap">Low Fat</span></td>
            <td>{{ Form::checkbox('type', 'lowcarb') }} <span class="nowrap">Low Carb</span></td>
            <td>{{ Form::checkbox('type', 'vegetarian') }}  <span class="nowrap">Vegetarian</span></td>
            <td>{{ Form::checkbox('type', 'glutenfree') }} <span class="nowrap">Gluten Free</span></td>
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
