<?php
use \App\ingredient;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Page
Route::get('/', function () {
	return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Recipe Pages
|--------------------------------------------------------------------------
*/

//Ingredients
Route::get('/ingredients', function () {
	return view('ingredients');
});

Route::resource('/ingredients', 'IngredientsListController');

Route::get('/recipes', function () {
	return view('recipes_default');
});

Route::resource('recipes', 'RecipesController');

//Add Recipe
Route::get('/createrecipe', function () {
	return view('createrecipe');
});

// Route::post('/createrecipe', function () {
// 	return view('welcome');
// });

Route::resource('createrecipe', 'CreateRecipeController');

// Route::post('createrecipe',['as'=>'recipe_store','uses'=>'CreateRecipeController@store']);

// Route::post('createrecipe', ['as'=>'storeRecipe','uses'=>'CreateRecipeController@store']);

Route::post('storeRecipe', 'CreateRecipeController@store');
Route::post('storeRecipe',['as'=>'postStore','uses'=>'CreateRecipeController@store']);
Route::get('storeRecipe',['as'=>'getStore','uses'=>'CreateRecipeController@store']);

//Find Recipes
Route::get('findrecipe', function () {
	return view('findrecipes');
});

<<<<<<< HEAD
Route::resource('findrecipe', 'FindIngredientController');
=======


Route::resource('findrecipes', 'FindIngredientController');
>>>>>>> origin/master
// Route::resource('/account', 'FindIngredientController');

Route::post('findrecipe', 
	['as' => 'recipe_query', 'uses' => 'FindIngredientController@queryRecipes']);
Route::get('search', 'FindRecipeController@search');
// Selectize Search
Route::get('/api/search', 'SearchController@index');

// Selectize getSearch results
// Route::get('createrecipe/api/results', 'SearchController@results');
Route::post('ingList', 'SearchController@results');
Route::post('ingList',['as'=>'postIngList','uses'=>'SearchController@results']);
Route::get('ingList',['as'=>'getIngList','uses'=>'SearchController@results']);

/*
|--------------------------------------------------------------------------
| Favorite
|--------------------------------------------------------------------------
*/

Route::post('addToFavorites', 'FavoriteController@toggleFavorite');
Route::post('addToFavorites',['as'=>'postFavorite','uses'=>'FavoriteController@toggleFavorite']);
Route::get('addToFavorites',['as'=>'getFavorite','uses'=>'FavoriteController@toggleFavorite']);

/*
|--------------------------------------------------------------------------
| Register, Login & Activation Pages
|--------------------------------------------------------------------------
*/

Route::get('/activationmail', function () {
	return view('activationmail');
});

Route::get('/home', 'HomeController@index');

Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 

Auth::routes();


/*
|--------------------------------------------------------------------------
| Import textfile to populate the Ingredient database
|--------------------------------------------------------------------------
*/

Route::get('uploadIngredients', function(){

	//open textfile
	$fileD = fopen(storage_path('ingredients.txt'),"r");
	$column=fgetcsv($fileD);

	//while end of file hasn't been reached
	while(!feof($fileD))
	{
		$rowData[] = fgetcsv($fileD);
	}

	//for every row
	foreach ($rowData as $key => $value) 
	{
		//insert its name and category into a new Ingredient
		$inserted_data=array(
			'name'=>$value[0],
			'category'=>$value[1],
		);

		Ingredient::create($inserted_data);
	}
	// print_r($rowData);
});


/*
|--------------------------------------------------------------------------
| Image Upload and Resizing
|--------------------------------------------------------------------------
*/

Route::get('intervention-resizeImage',['as'=>'intervention.getresizeimage','uses'=>'FileController@getResizeImage']);

Route::post('intervention-resizeImage',['as'=>'intervention.postresizeimage','uses'=>'FileController@postResizeImage']);

Route::post('intervention-resize','FileController@postResizeImage');

Route::post('add_ingredients',['as'=>'add_ingredients','uses'=>'CreateRecipeController@store']);

// Test
Route::get('/test', function () {
	// return view('test');
});


/*
|--------------------------------------------------------------------------
| Sander edit
|--------------------------------------------------------------------------
*/

// View account, redirect if nog logged in
Route::get('/account', function () {
	if (Auth::check()) {
		return view('auth.account');
	}
	else {
		return redirect()->to('/');
	}
});

// Route for logout button
Route::get('/logout', function () {
	Auth::logout();
	return redirect()->to('/');
});

// View password reset mail
Route::get('/viewEmail', function() {
	dd(Config::get('mail'));
});

Route::get('/about', function () {
	return view('about');
});


