<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests\CreateRecipeRequest;
use DB;
use Illuminate\Support\Facades\Input;
use Response;
use \App\ingredient;
use \App\Recipe;
use Carbon\Carbon;

if(session_status() == PHP_SESSION_NONE)
{ 
    session_start();
}

class CreateRecipeController extends Controller
{
      public function index(Recipe $recipe, Ingredient $ingredient)
      {
          $ingredients = ingredient::all()->sortBy('name');
          $dairy = ingredient::all()->where('category', 'Dairy')->sortBy('name');
          $meats = ingredient::all()->where('category', 'Meats')->sortBy('name');
          $vegetables = ingredient::all()->where('category', 'Vegetables')->sortBy('name');
          $fruits = ingredient::all()->where('category', 'Fruits')->sortBy('name');
          $spices = ingredient::all()->where('category', 'Spices')->sortBy('name');
          $fish = ingredient::all()->where('category', 'Fish')->sortBy('name');
          $bakingGrains = ingredient::all()->where('category', 'Baking & Grains')->sortBy('name');
          $oils = ingredient::all()->where('category', 'Oils')->sortBy('name');
          $seafood = ingredient::all()->where('category', 'Seafood')->sortBy('name');
          $addedSweeteners = ingredient::all()->where('category', 'Added sweeteners')->sortBy('name');
          $seasonings = ingredient::all()->where('category', 'Seasonings')->sortBy('name');
          $nuts = ingredient::all()->where('category', 'Nuts')->sortBy('name');
          $condiments = ingredient::all()->where('category', 'Condiments')->sortBy('name');
          $desertSnacks = ingredient::all()->where('category', 'Desert & snacks')->sortBy('name');
          $beverages = ingredient::all()->where('category', 'Beverages')->sortBy('name');
          $soups = ingredient::all()->where('category', 'Soups')->sortBy('name');
          $dairyAlternatives = ingredient::all()->where('category', 'Dairy alternatives')->sortBy('name');
          $peas = ingredient::all()->where('category', 'Peas')->sortBy('name');
          $sauce = ingredient::all()->where('category', 'Sauce')->sortBy('name');
          $alcohol = ingredient::all()->where('category', 'Alcohol')->sortBy('name');
          
          $rec = recipe::all();

          return view('createrecipe', compact('rec', 'ingredients', 'dairy', 'meats',  'vegetables', 'fruits', 'spices', 'fish', 'bakingGrains', 'oils', 'seafood', 'addedSweeteners', 'seasonings', 'nuts', 'condiments', 'desertSnacks', 'beverages', 'soups', 'dairyAlternatives', 'peas', 'sauce', 'alcohol'));
      }

      public function create()
      {
             //
      }
    
      public static function store(Request $request)
      {

          $recipe = new Recipe;
          $recipe->name = $request->input('title');
          $recipe->image = $_SESSION['imageUpload'];
          $recipe->author = Auth::user()->name;
          $recipe->type = $request->input('type');
          $recipe->kitchen = $request->input('kitchen');
          $recipe->serving_size = $request->input('serving_size');
          $recipe->instructions = $request->input('instructions');
          $carbon = new Carbon();
          $recipe->date_added = $carbon::now();
          $recipe->save();
              
          //Attach Ingredients to Recipe
          $value = $request->input('ing');

          foreach($value as $val)
          {         
              $ing = ingredient::all()->where('name', '=', $val);
              $recipe->ingredients()->attach($ing);
          }

          return back();
      }

      public static function clear()
      {
          //Clear session if 'Clear All' is pressed
          if(isset($_GET['clear2']))
          {
              unset($_SESSION['contents2']);
          }
          return back(); 
      }   
     
      public static function ingredientSession()
      {
             
          if(session_status() == PHP_SESSION_NONE)
          {
              session_start();
          }

          //Start a new session if necessary
          if(!isset($_SESSION['contents2']))
          {
              $_SESSION['contents2'] = array();
          }

          //Checked if x to close option has been pressed for any list item and remove it
          foreach($_SESSION['contents2'] as $key => $a)
          {
              if(isset($_GET[$key]))
              {
                  unset($_SESSION['contents2'][$key]);
                  $_SESSION['contents2'] = array_values($_SESSION['contents2'] );
              }  
          }
          $c2 = $_SESSION['contents2'];

          //Echo out the list that is in the session if any
          foreach($_SESSION['contents2'] as $key => $a)
          {
              echo '<li class="list-group-item"><form action="" method="get">' . $a . '<input type="submit" class="close" data-dismiss="list-group" aria-hidden="true" name="' . $key . '" value="&times;"></form></li>';
          }

          //Get submitted content from the modal with the ingredients list
          if(isset($_GET['submit']))
          {
              $arr = $_GET['fridgecontents'];

              foreach($arr as $key => $a)
              {
                  //Push the contents to the session array
                  array_push($_SESSION['contents2'], $a);

                  //Add the new item(s) to the list
                  echo '<li class="list-group-item"><form action="" method="get">' . $a . '<input type="submit" class="close" data-dismiss="list-group" aria-hidden="true" name="' . $key . '" value="&times;"></form></li>';
              }
              echo '<br>';
          }
      }
}
