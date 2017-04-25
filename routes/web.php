<?php

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

Route::get('/', function () {
    return view('recipes');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/ingredients', function () {
    return view('ingredients');
});

Route::get('/activationmail', function () {
    return view('activationmail');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/recipes', function () {
    return view('recipes_default');
});

Route::post('/findrecipes', 'IngredienstListController@create');

Route::get('/findrecipes', function () {
    return view('findrecipes');
});

Route::get('/createrecipe', function () {
    return view('createrecipe');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 

Route::resource('recipes', 'RecipesController');

Route::resource('createrecipe', 'IngredientsListController');

Route::resource('findrecipes', 'FindIngredientController');

Auth::routes();

Route::get('/home', 'HomeController@index');

/* Google API */
Route::get('glogin',array('as'=>'glogin','uses'=>'UserController@googleLogin')) ;
Route::get('google-user',array('as'=>'user.glist','uses'=>'UserController@listGoogleUser')) ;

Route::get('dashboard', 'LoginController@showDashBoard')
	->middleware(['auth']); //protect the dashboard page using this middleware

Route::get('login', 'LoginController@showLoginPage');

Route::get('logout', 'LoginController@logout');
 
Route::get('login/{provider}', 'LoginController@auth')
    ->where(['provider' => 'facebook|google|twitter']);
 
Route::get('login/{provider}/callback', 'LoginController@login')
    ->where(['provider' => 'facebook|google|twitter']);


