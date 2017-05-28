<?php
use \App\ingredient;
use App\Http\Controllers\FindIngredientController;
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

//Create Recipe
Route::resource('createrecipe', 'CreateRecipeController');

// Route::post('storeRecipe', 'CreateRecipeController@store');
Route::post('storeRecipe',['as'=>'postStore','uses'=>'CreateRecipeController@store']);
// Route::get('storeRecipe',['as'=>'getStore','uses'=>'CreateRecipeController@store']);

//Find Recipes
Route::get('findrecipes', function () {
	return view('findrecipes');
});

Route::resource('findrecipes', 'FindIngredientController');
// Route::resource('/account', 'FindIngredientController');

Route::post('findrecipes', 
	['as' => 'recipe_query', 'uses' => 'FindIngredientController@queryRecipes']);
Route::get('search', 'FindRecipeController@search');

// Selectize Search
Route::get('/api/search', 'SearchController@index');

// Selectize getSearch results
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

/*
|--------------------------------------------------------------------------
| Sander edit
|--------------------------------------------------------------------------
*/

Route::resource('/account', 'AccountController');

// Route::post('storeFridge', 'AccountController@store');
Route::post('storeFridge',['as'=>'postFridge','uses'=>'AccountController@blah']);
Route::get('storeFridge',['as'=>'getFridge','uses'=>'AccountController@store']);

// Route for logout button
Route::get('/logout', function () {
	Auth::logout();
	return redirect()->to('/');
});



// View password reset mail
Route::get('/viewEmail', function() {
	dd(Config::get('mail'));
});

// About page
Route::get('/about', function () {
	return view('about');
});

<<<<<<< HEAD
Auth::routes();

// Link from mail for user activation
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');
=======
>>>>>>> origin/master
