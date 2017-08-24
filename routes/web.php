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
    return view('welcome');	
})->middleware('guest');


Route::group(['middleware' => ['web']], function () {
	Auth::routes();

	Route::get('/home',['as' => 'home_path', 'uses' => 'UserController@index']);
	Route::get('/logout', 'Auth\LoginController@logout');

	Route::group(['prefix' => 'admin'], function(){
		Route::get('/',['as' => 'admin.index', 'uses' => 'AdminController@index']);
		Route::get('add', ['as' => 'admin.addFarmPage', 'uses' => 'AdminController@getAddFarmPage']);
		Route::post('add', ['as' => 'admin.addFarm', 'uses' => 'AdminController@addFarm']);
		Route::get('farms', ['as' => 'admin.farmList', 'uses' => 'AdminController@viewFarmList']);
	});

	Route::group(['prefix' => 'farm'], function(){
		Route::get('/',['as' => 'farm.index', 'uses' => 'FarmController@index']);
		Route::post('/authenticate',['as' => 'farm.confirmAuthenticationCode', 'uses' => 'FarmController@authenticateUser']);
		
	});
});

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');


// Route::get('/home', 'HomeController@index')->name('home');
