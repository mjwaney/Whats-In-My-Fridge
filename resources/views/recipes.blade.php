@extends('layouts.app')
@section('title', 'Recipes') 
@section('p1')
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>
<div class="panel panel-default">
    <div class="panel-heading clearfix" style=> 
        @isset($recipe) {{$recipe->name}} @endisset
          {{ Form::open(array('name' => 'fav', 'method' => 'get')) }}
        <button type="submit" name="fav" class="btn btn-default pull-right" id="favRecipe" value="{{$recipe->id}}">@isset($recipe->favoritesCount){{ $recipe->favoritesCount }}@endisset
          <span class="glyphicon glyphicon-star-empty "></span>
        </button>{!! Form::close() !!}
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
</div>
    @endisset
 <script type="text/javascript">
    var root = '{{url("/")}}';
 </script>   
<script type="text/javascript">
$(document).ready(function(e)
{
   $('#favRecipe').on('submit', function (event)
   {
      event.preventDefault();

      var value = $(this).attr('value');
      // alert(value);

       $.ajax
       ({
            type: 'get',
            url: root+'addToFavorites',
            // contentType: 'application/json',
            // dataType: 'json',
            // contentType: 'charset=UTF-8',
            data: { 'value': value },
            async: false,
            data: $('form').serialize(),
            success: function (res) 
            {
               alert('Recipe Added to favorites');
            },
      });
   });
});
</script>
    @endsection