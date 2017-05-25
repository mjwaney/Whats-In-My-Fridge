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

		if(!isset($_SESSION['fridge']))
		{
			$_SESSION['fridge'] = array();
		}
		$_SESSION['fridge'][] = $value;
		$fridge = $_SESSION['fridge'];

		// foreach ingredient in the array (as $val) ->where('ingredient_id', '=', $id)
		foreach($value as $val)
		{         
			//get the corresponding ingredient
			$ingr = Ingredient::where('name', '=', $val)->get();

			//check recipes that have the given ingredient
			$data = Recipe::whereHas('ingredients', function ($query) use($val) {
			    $query->where('name', '=', $val);
			})->get();

			$desired_object = $data->filter(function($item) {
			    return $item->id;
			})->first();

			$id = $desired_object->id;

			//get all the missing ingredients
			$noning = Ingredient::where('name', '!=', $val)
			->whereHas('recipes', function ($query) use($id) {
			    $query->where('id', '=', $id);
			})->get();

		}

		return Response::json(array(
    			'data'=>$data,
    			'ingr'=>$ingr,
    			'noning'=>$noning
		));
		return view('findrecipes', compact('rec'));
	}	


}
