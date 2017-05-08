<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use App\ingredient;
use App\Http\Requests;

class SearchController extends Controller
{

   // public function appendValue($data, $type, $element)
   // {
   //    // operate on the item passed by reference, adding the element and type
   //    foreach ($data as $key => & $item) {
   //       $item[$element] = $type;
   //    }
   //    return $data;     
   // }

   // public function appendURL($data, $prefix)
   // {
   //    // operate on the item passed by reference, adding the url based on slug
   //    foreach ($data as $key => & $item) {
   //       $item['url'] = url($prefix.'/'.$item['slug']);
   //    }
   //    return $data;     
   // }

    public function index()
    {
    	// Retrieve the user's input and escape it
    	$query = e(Input::get('q',''));

    	// If the input is empty, return an error response
    	if(!$query && $query == '') return Response::json(array(), 400);

    	$ingredients = ingredient::where('name','like','%'.$query.'%')
               ->orderBy('name','asc')
               ->take(5)
               ->get(array('name'))->toArray();

        $categories = ingredient::where('category','like','%'.$query.'%')
               ->orderBy('category','asc')
               ->take(5)
               ->get(array('category'))->toArray();

    	// Normalize data
         // $ingredients   = $this->appendURL($ingredients, 'ingredients');
	// $categories   = $this->appendURL($categories, 'categories');

    	// Add type of data to each item of each set of results
	// $ingredients = $this->appendValue($ingredients, 'ingredients', 'class');
         // $categories = $this->appendValue($categories, 'category', 'class');

    	// Merge all data into one array
    	$data = array_merge($ingredients, $categories);

    	return Response::json(array(
    		'data'=>$data
    	));
    }
}
