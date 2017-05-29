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
			
		
		// dd('blag');
// $query->orWhere('name', '=', $val);

		// dd($query);

		// $data = Recipe::whereHas('ingredients', function ($query) {
		//     $query;
		// })->get();

      			// $ingr = "blah";
			//get the corresponding ingredient
			$ingr = Ingredient::where('name', $val)->get();
			// var_dump($ingr);
			//check recipes that have the given ingredient
			// $recipes = Recipe::whereHas('ingredients', function ($query) use($ingr) {
			//     $query->whereIn('id', $ingr->toArray());
			// })->get();
			// $recipes->toArray();
			// Missing Ingredients part
			// $desired_object = $data->filter(function($item) {
			//     return $item->id;
			// })->first();
			// $data->push($data);
			// $id = $desired_object->id;

			// get all the missing ingredients
			
		}

		// $noning = Ingredient::where('name', '!=', $val)
		// 	->whereHas('recipes', function ($query) use($id) {
		// 	    $query->where('id', '=', $id);
		// 	})->get();
			
			$noning = "2";
		$data = $data->get();

			// var_dump($data);
		return Response::json(array(
			'data'=>$data,
			'ingr'=>$ingr,
			'noning'=>$noning
		));
	}


}
