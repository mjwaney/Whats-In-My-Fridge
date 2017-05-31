<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\Recipe;
use \App\ingredient;
use Response;
use App\Http\Requests;

/*
|----------------------------------------------------------------------------------------------------------
| Image Controller: handles image uploads and resizing
|----------------------------------------------------------------------------------------------------------
*/
class FindRecipeController extends Controller
{

	/**
	 * Uses the passed ingredients and returns recipes containing those ingredients
	 * (at least it's supposed to)
	 *@param Gets ingredients from selectize and modal elements
	 * @return JSON $data, $ingr & $noning
	 */
	public static function search(Recipe $recipe, Request $request, Ingredient $ingredient)
	{	
		//get user input(ingredients) from selectize/modal
		$value = $request->input('ing');
		// dd($value);
		
		foreach($value as $key => $val)
		{
			if($key == 0)
			{
				$data = Recipe::whereHas('ingredients', function ($query) use($val){
				    $query->where('name', '=', $val);
				});
			}
			else
			{
				$data->orWhereHas('ingredients', function ($query) use($val){
				    $query->where('name', '=', $val);
				});
			}
			
			$ingr = Ingredient::where('name', $val)->get();

			// Missing Ingredients part
			$desired_object = $data->get()->filter(function($item) {
			    return $item->id;
			})->first();
			// $data->push($data);
			$id = $desired_object->id;

			// get all the missing ingredients
			$noning = Ingredient::where('name', '!=', $val)
				->whereHas('recipes', function ($query) use($id) {
				    $query->where('id', '=', $id);
				})->get();
			
		}//End foreach

		// $noning = "2";
		$data = $data->get();
		$data->unique();

		return Response::json(array(
			'data'=>$data,
			'ingr'=>$ingr,
			'noning'=>$noning
		));
	}


}
