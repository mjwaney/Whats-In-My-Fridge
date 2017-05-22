<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
use App\ingredient;
use App\Http\Requests;

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

    	return Response::json(array(
    		'data'=>$data
    	));
    }

    public function results(Request $request)
    {
             // if(session_status() == PHP_SESSION_NONE)
             // { 
             //     session_start();
             // } 
             //  $ing = $_POST;
             //  // dd($ing);

             //  if(!isset($_SESSION['list']))
             //  {
             //      $_SESSION['list'] = array();
             //  }
              
             //  $_SESSION['list'][] = $ing;
             //  var_dump($_SESSION['list']);
      
             //    // dd('got here');
             //    return back()
             //          ->with($_SESSION['list']);
                          // ->with('success','Ingredients added succesfully');
                //       ->with('value',$value);
    }

    public function getIngList()
    {
        return view('getIngList');
    }
}
