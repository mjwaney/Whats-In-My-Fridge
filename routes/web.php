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

//Home Page
Route::get('/', function () {
    return view('recipes');
});

/*
|--------------------------------------------------------------------------
| Recipe Pages
|--------------------------------------------------------------------------
*/

//Default
Route::get('/recipes', function () {
    return view('recipes_default');
});

Route::resource('recipes', 'RecipesController');

//Add Recipe
Route::get('createrecipe', function () {
    return view('createrecipe');
});

Route::resource('createrecipe', 'CreateRecipeController');

Route::post('createrecipe',['as'=>'recipe_store','uses'=>'CreateRecipeController@store']);

//Find Recipes
Route::get('findrecipes', function () {
    return view('findrecipes');
});

Route::resource('findrecipes', 'FindIngredientController');

Route::post('findrecipes', 
  ['as' => 'recipe_query', 'uses' => 'FindIngredientController@queryRecipes']);

/*
|--------------------------------------------------------------------------
| //Register, Login & Activation Pages
|--------------------------------------------------------------------------
*/
Route::get('/activationmail', function () {
    return view('activationmail');
});

Route::get('/home', 'HomeController@index');

Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 

Auth::routes();

/* Google API */
// Route::get('glogin',array('as'=>'glogin','uses'=>'UserController@googleLogin')) ;
// Route::get('google-user',array('as'=>'user.glist','uses'=>'UserController@listGoogleUser')) ;

Route::get('dashboard', 'LoginController@showDashBoard')
  ->middleware(['auth']); //protect the dashboard page using this middleware

Route::get('login', 'LoginController@showLoginPage');

// Route::post('login', 'LoginController@credentials');

// ['as' => 'recipe_store', 'uses' => 'CreateRecipeController@store']);

Route::get('logout', 'LoginController@logout');
 
Route::get('login/{provider}', 'LoginController@auth')
    ->where(['provider' => 'facebook|google|twitter']);
 
Route::get('login/{provider}/callback', 'LoginController@login')
    ->where(['provider' => 'facebook|google|twitter']);

/*
|--------------------------------------------------------------------------
| Import textfile to populate the Ingredient database
|--------------------------------------------------------------------------
*/
Route::get('uploadIngredients',function(){
      
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

//search
Route::get('createrecipe/api/search', 'SearchController@index');

//test
Route::get('/test', function () {
    // return view('test');
});



// Sander edit

Route::get('/viewEmail', function()
{
    dd(Config::get('mail'));
});

Route::get('/account', function () {
/*	if (Auth::check() {
		return view('auth.account');
	}
	else {
		return view('welcome');
	}*/
/*	@if (Auth::check())
		return view('auth.account');
	@else
		return view('welcome');
	@endif*/
	return view('auth.account');
});

Route::get('/logout', function () {
	Auth::logout();
	return redirect()->to('/');
});
