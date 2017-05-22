<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\Recipe;

class RecipesController extends Controller
{
    /**
     * Default Recipe Page. Gets recipes from database, and passes them on to the default recipe view
     *@param Recipe model data
     * @return show the default recipe page, pass it recipe database collection
     */
    public function index(Recipe $recipe)
    {   
        $rec = Recipe::all()->sortByDesc('date_added');
        return view('recipes_default', compact('rec'));
    }
     
    /**

     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipe.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipes', compact('recipe'));
    }

    /**
     * Get the corresponding id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = recipe::find($id);
        return $recipe;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
