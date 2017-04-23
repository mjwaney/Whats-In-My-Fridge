@extends('layout.app')

@section('title', 'Create Recipe')

@section('p1')
<form class="form-horizontal">
  <fieldset>
    <legend>Create Recipe</legend>
    <div class="form-group">
      <label for="inputTitle" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputTitle" placeholder="Recipe Title" type="text">
      </div><br><br>
    </div>

    <div class="form-group">
      <label for="inputTitle" class="col-lg-2 control-label">Type</label>
      <div class="col-lg-10">
        <div class="checkbox">
          <label>
            <input type="checkbox"> Snack
          </label>
          <label>
            <input type="checkbox"> Breakfast
          </label>
          <label>
            <input type="checkbox"> Lunch
          </label>
          <label>
            <input type="checkbox"> Dinner
          </label>
          <label>
            <input type="checkbox"> Dessert
          </label>
          <label>
            <input type="checkbox"> Side Dish
          </label>
          <br>
          <label>
            <input type="checkbox"> Fast Food
          </label>
          <label>
            <input type="checkbox"> Vegan
          </label>
          <label>
            <input type="checkbox"> Vegetarian
          </label>
          <label>
            <input type="checkbox"> Gluten Free
          </label>
          <label>
            <input type="checkbox"> Low Fat
          </label>
          <label>
            <input type="checkbox"> Low Carb
          </label>

          <br><br>
        </div>
      </div>
    </div>
    
     <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Serve Size</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option>1 Person</option>
          <option>1-2 Persons</option>
          <option>3-4 Persons</option>
          <option>5-8 Persons</option>
          <option>More</option>
        </select>
        <br>
      </div>
    </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">Kitchen</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
            African
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            American
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            British
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            Chinese
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            French
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            Greek
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            Indonesian
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            Italian
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            Japanese
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            Middle-Eastern
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            Russian
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            South-American
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            Turkish
          </label>
        </div>

        <div class="radio">
          <label>
            <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
            Other
          </label><br><br>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Ingredients</label>
      <div class="col-lg-10">
        <ul class="list-group">
	  <li class="list-group-item">
	    <span class="badge">14</span>
	    Pepper
	  </li>
	  <li class="list-group-item">
	    <span class="badge">2</span>
	    Salt
	  </li>
	  <li class="list-group-item">
	    <span class="badge">1</span>
	    Lettuce
	  </li>
	</ul>
      	<a data-toggle="modal" href="#myModal" class="btn btn-info">Add Ingredient</a>
        <br><br>
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label" >Instructions</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea" placeholder="Instructions on how to prepare your recipe"></textarea>
        <span class="help-block"></span>
      </div>
    </div>
   
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" name="submit_recipe" class="btn btn-primary">Submit</button>
      </div>
    </div>

    <div id="myModal" class="modal" data-backdrop="false" >
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title">Add Ingredients</h4>
	      </div>
	      <div class="modal-body">
          
	        <p class="checkbox">
	        	@foreach($ing as $key=>$r)
	 	<label>
	            <input type="checkbox" name="checkbox[]"> {{  $ing[$key]->name }}
	          	</label>
		@endforeach  
	        </p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
  
  </fieldset>
</form>


@endsection