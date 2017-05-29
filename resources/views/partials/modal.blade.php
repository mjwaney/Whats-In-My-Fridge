<?php 
use App\Http\Controllers\FindIngredientController; 
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>
<script type="text/javascript">
   var url = $(location).attr('href');
   var root = url;
</script>
<script>
$(function () 
{
   $('#modalAdd').on('submit', function (e) 
   {
      e.preventDefault();

      var modalAdd = $('input[class=addIngredient]:checked').map(function(){
         return $(this).val();
      }).get();

      $.each(modalAdd, function( index, value ) {
        document.getElementById("ingpanel").innerHTML += '<li class="list-group-item listItem">' + value + '</li>'; 
       });
   });
});
</script>
<!-- Modal Start -->  
<div id="myModal2" class="modal fade"  data-backdrop="true">
  <div class="modal-dialog"><!-- Modal Dialog -->
    <div class="modal-content"><!-- Modal Content -->
      <div class="modal-header"><!-- Modal Header -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2 class="modal-title center">Add Ingredients</h2>
      </div><!-- Close Modal Header -->

        <form id="modalAdd" action="" method="get" >
          <div class="modal-body"><!-- Modal Body -->
                {{ csrf_field() }}
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" class="categoryTab" href="#all">All</a></li>
                        <li><a href="#dairy" class="categoryTab" data-toggle="tab">Dairy</a></li>
                        <li><a href="#meats" class="categoryTab" data-toggle="tab">Meats</a></li>
                        <li><a href="#vegetables" class="categoryTab" data-toggle="tab">Vegetables</a></li>
                        <li><a href="#fruits" class="categoryTab" data-toggle="tab">Fruits</a></li>
                        <li><a href="#spices" class="categoryTab" data-toggle="tab">Spices</a></li>
                        <li><a href="#fish" class="categoryTab" data-toggle="tab">Fish</a></li>
                        <li><a href="#bakingGrains" class="categoryTab" data-toggle="tab">Baking & Grains</a></li>
                        <li><a href="#oils" class="categoryTab" data-toggle="tab">Oils</a></li>
                        <li><a href="#seafood" class="categoryTab" data-toggle="tab">Seafood</a></li>
                        <li><a href="#addedSweeteners" class="categoryTab" data-toggle="tab">Added Sweeteners</a></li>
                        <li><a href="#seasonings" class="categoryTab" data-toggle="tab">Seasonings</a></li>
                        <li><a href="#nuts" class="categoryTab" data-toggle="tab">Nuts</a></li>
                        <li><a href="#condiments" class="categoryTab" data-toggle="tab">Condiments</a></li>
                        <li><a href="#desertSnacks" class="categoryTab" data-toggle="tab">Desert & Snacks</a></li>
                        <li><a href="#beverages" class="categoryTab" data-toggle="tab">Beverages</a></li>
                        <li><a href="#soups" class="categoryTab" data-toggle="tab">Soups</a></li>
                        <li><a href="#dairyAlternatives" class="categoryTab" data-toggle="tab">Dairy Alternatives</a></li>
                        <li><a href="#peas" class="categoryTab" data-toggle="tab">Peas</a></li>
                        <li><a href="#sauce" class="categoryTab" data-toggle="tab">Sauce</a></li>
                        <li><a href="#alcohol" class="categoryTab" data-toggle="tab">Alcohol</a></li>
                      </ul>
                 <div class="tab-content">     
                     <div id="all" class="tab-pane fade in active">
                           {{ FindIngredientController::showIngredientList($ingredients) }}
                     </div>
                      <div id="dairy" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($dairy) }} 
                      </div> 
                      <div id="meats" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($meats) }} 
                      </div> 
                     <div id="vegetables" class="tab-pane fade">
                              {{ FindIngredientController::showIngredientList($vegetables) }}
                     </div>
                      <div id="fruits" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($fruits) }} 
                      </div> 
                      <div id="spices" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($spices) }} 
                      </div> 
                      <div id="fish" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($fish) }} 
                      </div> 
                      <div id="bakingGrains" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($bakingGrains) }} 
                      </div> 
                      <div id="oils" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($oils) }} 
                      </div> 
                      <div id="seafood" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($seafood) }} 
                      </div> 
                      <div id="addedSweeteners" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($addedSweeteners) }} 
                      </div> 
                      <div id="seasonings" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($seasonings) }} 
                      </div> 
                      <div id="nuts" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($nuts) }} 
                      </div> 
                      <div id="condiments" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($condiments) }} 
                      </div> 
                      <div id="desertSnacks" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($desertSnacks) }} 
                      </div> 
                      <div id="beverages" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($beverages) }} 
                      </div> 
                      <div id="soups" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($soups) }} 
                      </div> 
                      <div id="dairyAlternatives" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($dairyAlternatives) }} 
                      </div> 
                      <div id="peas" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($peas) }} 
                      </div> 
                      <div id="sauce" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($sauce) }} 
                      </div> 
                      <div id="alcohol" class="tab-pane fade">
                            {{ FindIngredientController::showIngredientList($alcohol) }} 
                      </div> 
               </div><!-- Close tab-content-->
          </div><!-- Close Modal Body -->
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-default" onclick="loadDoc()" data-dismiss="modal">Add</button> -->
            <button type="submit" name="fav" class="btn btn-default">Add</button>
          </div><!-- Close Modal Footer -->
      </form>
    </div><!-- Close Modal Content -->
  </div><!-- Close Modal Dialog -->
</div>
