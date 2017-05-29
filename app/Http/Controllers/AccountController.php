<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use Response;
use \App\ingredient;
use \App\Recipe;
use \App\User;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use Carbon\Carbon;

class AccountController extends Controller
{
    public function index(Request $request, Ingredient $ingredient, Recipe $recipe)
    {
    	if (Auth::check()) {

                    $author = Auth::user()->name;

                    $userRec = Recipe::all()->where('author', '=', $author)->sortByDesc('date_added');
                    $userIng = Ingredient::whereHas('users', function ($query) use($author) {
                        $query->where('name', '=', $author);
                    })->get();

                                                    
                    $user = Auth::user();
                    $userIng = $user->ingredients;
                    $ingDate = array();

                    foreach($userIng as $ing)
                    {
                        $ingDate[] = $ing->pivot->expiration_date;
                    }

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
	                
	        return view('auth.account', compact('rec', 'userRec', 'userIng', 'ingDate', 'ingredients', 'dairy', 'meats',  'vegetables', 'fruits', 'spices', 'fish', 'bakingGrains', 'oils', 'seafood', 'addedSweeteners', 'seasonings', 'nuts', 'condiments', 'desertSnacks', 'beverages', 'soups', 'dairyAlternatives', 'peas', 'sauce', 'alcohol'));
	}
	else 
	{
		return redirect()->to('/');
	}
    }
    public function blah()
    {
    	var_dump('blaaaah');
    }

    public function store(Request $request, Ingredient $ingredient, Recipe $recipe)
    {
    	$user = Auth::user();

    	//Attach Ingredients to Account
    	$value = $request->input('ing');

    	foreach($value as $val)
    	{         
    	    $ing = ingredient::all()->where('name', '=', $val);
    	    $user->ingredients()->attach($ing);
    	}

    	return back();
    }

    public function remove(Request $request)
    {
    	$user = Auth::user();

    	$value = $request->input('ing');
    	$ing = ingredient::all()->where('name', '=', $value[0]);

    	$user->ingredients()->detach($ing);

    }

    public function addDate(Request $request, Ingredient $ingredient)
    {
        $name = $request->input('ingName');
        $user = Auth::User();
        $date = $request->input('ingDate');
        $ingredients = ingredient::all()->where('name', '=', $name);

        foreach($ingredients as $ing)
        {
            $id = $ing->id;
        }
        Auth::User()->ingredients()->updateExistingPivot($id, ['expiration_date' => $date]);
    }

    public function removeRecipe(Request $request, Recipe $recipe)
    {

        $name = $request->input('ing');

        $recipe = Recipe::all()->where('name', '=', $name[0])->first();
        $user = User::all();
        $recipe->removeFavorite($user);

        $recipe->delete();  
    }
}
