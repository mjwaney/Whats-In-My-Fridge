@extends('layout.app')

@section('title', 'Find Recipes') 

@section('h1title')
    Find recipes 
@endsection

@section('p1')
   Find a recipe: <input type='text'></input>
@endsection

@section('p2')  
@isset($recipe)
     <select>
     <?php
        // foreach(Ingredients as $ingredient)
        // {
        //     echo '<option value="' . $ingredient . '">' . $ingredient. '</option>';
        // }
     ?>
    </select> 
    @endisset
@endsection