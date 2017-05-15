<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\ingredient;

class IngredientsListController extends Controller
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

        return view('/ingredients', compact('rec', 'ingredients', 'dairy', 'meats',  'vegetables', 'fruits', 'spices', 'fish', 'bakingGrains', 'oils', 'seafood', 'addedSweeteners', 'seasonings', 'nuts', 'condiments', 'desertSnacks', 'beverages', 'soups', 'dairyAlternatives', 'peas', 'sauce', 'alcohol'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

    public static function showIngredientList($category)
    {
          $n = 0;     
          echo '<table class="ingredientstable"><tr>'; 
          foreach($category as $key=>$cat)
          {
              echo '<td><input type="checkbox" class="addIngredient" name="fridgecontents[]" value="' . $category[$key]->name . '"> ' . $category[$key]->name . '</td>';
              
              $n++;

              if($n%4 == 0)
              {
                  echo '</tr>
                          <tr>';  
               }
           }
          echo '</table>'; 
     }

    public function show($id)
    {
        $ing = ingredient::find($id);
        return $ing->name;
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
