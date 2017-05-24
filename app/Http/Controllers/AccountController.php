<?php

namespace App\Http\Controllers;

use DB;
use \App\ingredient;
use \App\Recipe;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index(Ingredient $ingredient, Recipe $recipe)
    {
    	if (Auth::check()) {

	        $rec = Recipe::all()->sortByDesc('date_added');
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
	                
	        return view('auth.account', compact('rec', 'ingredients', 'dairy', 'meats',  'vegetables', 'fruits', 'spices', 'fish', 'bakingGrains', 'oils', 'seafood', 'addedSweeteners', 'seasonings', 'nuts', 'condiments', 'desertSnacks', 'beverages', 'soups', 'dairyAlternatives', 'peas', 'sauce', 'alcohol'));
	}
	else 
	{
		return redirect()->to('/');
	}
    }
}
