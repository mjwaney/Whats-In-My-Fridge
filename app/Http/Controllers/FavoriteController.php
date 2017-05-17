<?php

namespace App\Http\Controllers;
use App\Recipe;
use Illuminate\Support\Facades\Input;
use Auth;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggleFavorite(Recipe $recipe, Request $request)
    {
           $fav = $_POST['fav'];
    	$fav = Recipe::find($fav);
    	$fav->toggleFavorite();

            // dd($fav);

    	return back()->with(compact($fav));
    }

    public function favCount(Request $request)
    {
        $fav = Recipe::all();
        $favCount = $fav->favoritesCount;
        
        return back()->with(compact($favCount));
    }
}
