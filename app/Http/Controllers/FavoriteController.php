<?php

namespace App\Http\Controllers;
use App\Recipe;
use Illuminate\Support\Facades\Input;
use Auth;

use Illuminate\Http\Request;

/*
|----------------------------------------------------------------------------------------------------------
| Favorite Controller handles favoriting recipes
|----------------------------------------------------------------------------------------------------------
*/
class FavoriteController extends Controller
{

    /**
     * Toggles recipes being saved or not
     *
     * @return \Illuminate\Http\Response
     */
    public function toggleFavorite(Recipe $recipe, Request $request)
    {
           $fav = $_POST['fav'];
    	$fav = Recipe::find($fav);
    	$fav->toggleFavorite();

            // dd($fav);

    	return back()->with(compact($fav));
    }

    /**
     * Keeps track of how many times a recipe has been favorited
     *
     * @return \Illuminate\Http\Response
     */
    public function favCount(Request $request)
    {
        $fav = Recipe::all();
        $favCount = $fav->favoritesCount;
        
        return back()->with(compact($favCount));
    }
}
