<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\Recipe;
use \App\ingredient;
use Response;
use App\Http\Requests;

class FindRecipeController extends Controller
{
	
	public static function search(Recipe $recipe, Request $request, Ingredient $ingredient)
	{	
		//get user input(ingredients) from selectize/modal
		$value = $request->input('ing');
		$recipes = array();

		// foreach ingredient in the array (as $val) ->where('ingredient_id', '=', $id)
		foreach($value as $val)
		{         
			$ingr = Ingredient::where('name', '=', $val)->get();
			
			$data = Recipe::whereHas('ingredients', function ($query) use($val) {
			    $query->where('name', '=', $val);
			})->get();

			// $data = array_merge($data, $ing);

		}
		return Response::json(array(
    			'data'=>$data,
    			'ingr'=>$ingr
		));
		// return view('findrecipes', compact('rec'));
	}	
}