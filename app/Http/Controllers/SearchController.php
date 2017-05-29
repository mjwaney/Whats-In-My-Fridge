<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use App\ingredient;
use App\Http\Requests;

/*
|----------------------------------------------------------------------------------------------------------
| Search Controller handles Selectize Plugin Ingredient Search
|----------------------------------------------------------------------------------------------------------
*/

/**
 *@param gets input from js/user/selectize.js
 * @return JSON array $data
 */
class SearchController extends Controller
{
	public function index()
	{
		// Retrieve the user's input and escape it
		$query = e(Input::get('q',''));

		// If the input is empty, return an error response
		if(!$query && $query == '') return Response::json(array(), 400);

	 	 //Match the query to database ingredients
		$ingredients = ingredient::where('name','like','%'.$query.'%')
			->orderBy('name','asc')
			->take(5)
			->get(array('name'))->toArray();

		$categories = ingredient::where('category','like','%'.$query.'%')
			->orderBy('category','asc')
			->take(5)
			->get(array('category'))->toArray();

		// Merge all data into one array
		$data = array_merge($ingredients, $categories);

		//return json
		return Response::json(array(
			'data'=>$data
		));
	}

	public function getIngList()
	{
		return view('getIngList');
	}
}
