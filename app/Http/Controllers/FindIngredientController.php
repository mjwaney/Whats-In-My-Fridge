<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\ingredient;
use \App\Recipe;

if(session_status() == PHP_SESSION_NONE)
{ 
    session_start();
}

class FindIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Ingredient $ingredient)
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
                
        return view('findrecipes', compact('ingredients', 'dairy', 'meats',  'vegetables', 'fruits', 'spices', 'fish', 'bakingGrains', 'oils', 'seafood', 'addedSweeteners', 'seasonings', 'nuts', 'condiments', 'desertSnacks', 'beverages', 'soups', 'dairyAlternatives', 'peas', 'sauce', 'alcohol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $ing = ingredient::find($id);
        // return $ing->name;
    }

    /*  
    |--------------------------------------------------------------------------
    | Ingredient Session
    |--------------------------------------------------------------------------
    |
    | Session for the list of ingredients the user selected
    |
    */
    public static function ingredientSession()
    {
        //start session if there is none
        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }

        //Clear session if 'Clear All' is pressed
        if(isset($_GET['clear']))
        {
            unset($_SESSION['contents']);
        }

        //Start a new session if necessary
        if(!isset($_SESSION['contents']))
        {
            $_SESSION['contents'] = array();
        }
        
        //Checked if x to close option has been pressed for any list item and remove it
        // contents array = ingredients, key = index, a = value
        foreach($_SESSION['contents'] as $key => $a)
        { 
            if(isset($_GET[$key]))
            {
                //remove the session contents with the corresponding name/key
                unset($_SESSION['contents'][$key]);
                //set array back so indexes and values match
                $_SESSION['contents'] = array_values($_SESSION['contents'] );
            }  
        }

        //Echo out the list that is in the session if any
        foreach($_SESSION['contents'] as $key => $a)
        {
            //echo a block with $a as name of the ingredient and $key as its name attribute value
            echo '<li class="list-group-item"><form action="" method="get">' . $a . '<input type="submit" class="close" data-dismiss="list-group" aria-hidden="true" name="' .  $key . '" value="&times;"></form></li>';
        }

        //Get submitted content from the modal with the ingredients list
        if(isset($_GET['submit']))
        {
            $arr = $_GET['fridgecontents'];

            foreach($arr as $key => $a)
            {
                //Push the contents to the session array
                array_push($_SESSION['contents'], $a);

                //Add the new item(s) to the list
                echo '<li class="list-group-item"><form action="" method="get">' . $a . '<input type="submit" class="close" data-dismiss="list-group" aria-hidden="true" name="' . $key . '" value="&times;"></form></li>';
            }
            echo '<br>';
        }
    }

    /*  
    |--------------------------------------------------------------------------
    | Show Ingredients
    |--------------------------------------------------------------------------
    |
    | Get the database ingredients and show them as a list
    |
    */
    public static function showIngredientList($category)
    {
          $n = 0;     
          echo '<table class="ingredientstable"><tr>'; 
          foreach($category as $key=>$cat)
          {
              echo '<td><label><input type="checkbox" name="fridgecontents[]" value="' . $category[$key]->name . '">' . $category[$key]->name . '</label></td>';
              
              $n++;

              if($n%4 == 0)
              {
                  echo '</tr>
                          <tr>';  
               }
           }
          echo '</table>'; 
     }

     public static function queryRecipes(Ingredient $ingredient)
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
            
        $contents = $_SESSION['contents'];
        $_SESSION['findrecipeids'] = array();
        $_SESSION['findrecipenames'] = array();
            
        foreach($contents as $cont)
        {  
            $id = ingredient::all()->where('name', '=', $cont);

            $ingredient = ingredient::find($id);

            $recipeResult = $ingredient->recipes;

             foreach($recipeResult as $key => $r)
             {
                array_push($_SESSION['findrecipeids'], $r->id);
                array_push($_SESSION['findrecipenames'], $r->name);
             }

             return view('findrecipes', compact('recipeResult', 'ingredients', 'dairy', 'meats',  'vegetables', 'fruits', 'spices', 'fish', 'bakingGrains', 'oils', 'seafood', 'addedSweeteners', 'seasonings', 'nuts', 'condiments', 'desertSnacks', 'beverages', 'soups', 'dairyAlternatives', 'peas', 'sauce', 'alcohol'));
         }
      }
      
      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
          //
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
          //
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          //
      }
}
