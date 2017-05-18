<?php 
   use App\Http\Controllers\CreateRecipeController;  
?>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>
<script type="text/javascript">
   var url = $(location).attr('href');
   var root = url;
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
            url: '/api/search?q=xxxx',
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
            data: {'value': value},
            async: false,
            data: $('form').serialize(),
            success: function (res) 
            {
               alert('Ingredients Added');
            },
      });
   });
});
</script>



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