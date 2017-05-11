<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\ingredient;

class StoreIngredientsTextController extends Controller
{
    public function store()
    {
    	$vegetablelist = File::get(storage_path('vegetables.txt'));
        	$vegetables = explode("," $vegetablelist);

        	$veggielist = [];

	foreach ($vegetables as $veggie) {
	    $veggielist[] = [
	        'name'  => $safety,
	        'category'    => 'Vegetables',
	        'car'       => 15,
	    ];
	}

	DB::table('ingredients')->insert($veggielist);
    }
}
