@extends('layout.app')
@section('title', 'Find Recipes') 

@section('p1')
<div class="containerN"> <!-- Container for Panel -->
  <div class="panel panel-default"><!-- Panel -->
    <div class="panel-heading">Find recipes </div>
      <div class="panel-body"><!-- Panel Body-->
        <div class="form-group">
            <label for="select" class="col-lg-2 control-label">Ingredients</label>
              <div class="col-lg-10">
                <ul class="list-group">
                  @section('ingredients')
                    @show
                  <li class="list-group-item"><span class="badge">14</span>Pepper</li>
                  <li class="list-group-item"><span class="badge">2</span>Salt</li>
                  <li class="list-group-item"><span class="badge">1</span>Lettuce</li>
                </ul>
                <a data-toggle="modal" href="#myModal2" class="btn btn-info">Add Ingredient</a>
                <a href="#" class="btn btn-info">Find Recipe</a><br><br>
              </div><!-- Close Col-lg-2-->
        </div><!-- Close Form-Group-->
      </div><!-- Close Panel Body-->
  </div> <!-- Close Panel -->
</div><!-- Close Container for Panel -->

<!-- Modal Start -->  
<div id="myModal2" class="modal" data-backdrop="false">
  <div class="modal-dialog"><!-- Modal Dialog -->
    <div class="modal-content"><!-- Modal Content -->

      <div class="modal-header"><!-- Modal Header -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Add Ingredients</h4>
      </div><!-- Close Modal Header -->

      <div class="modal-body"><!-- Modal Body -->
        <form action="" method="post">
          <p class="checkbox">
              @foreach($ing as $key=>$r)
                <label><input type="checkbox"> {{  $ing[$key]->name }}</label>
              @endforeach  
          </p>
      </div><!-- Close Modal Body -->

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="fridgecontents" class="btn btn-default" value="Add" data-dismiss="modal">
       
      </div><!-- Close Modal Footer -->

    </div><!-- Close Modal Content -->
  </div><!-- Close Modal Dialog -->
</div><!-- Close Modal Start -->
@endsection