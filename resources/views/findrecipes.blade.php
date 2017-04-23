@extends('layout.app')

@section('title', 'Find Recipes') 

@section('p1')

<div class="containerN">
        <div class="panel panel-default">
            <div class="panel-heading"> Find recipes </div>

@endsection

@section('p2')  
<div class="panel-body">   
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
        <a data-toggle="modal" href="#myModal2" class="btn btn-info">Add Ingredient</a>
        <a href="#" class="btn btn-info">Find Recipe</a>
        <br><br>
      </div>
    </div></div>

    
      </div>
    </div>
<div id="myModal2" class="modal" data-backdrop="false" >
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
                <input type="checkbox"> {{  $ing[$key]->name }}
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
@endsection