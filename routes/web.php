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
  Route::get('/home', 'HomeController@index')->name('home');

  Route::group(['prefix' => 'farm'], function(){
    Route::get('/',['as' => 'farm.index', 'uses' => 'FarmController@index']);

    // Swine Routes
    Route::get('add_sow_record', ['as' => 'farm.pig.add_sow_record', 'uses' => 'FarmController@getAddSowRecordPage']);
    Route::post('submit_sow_record', ['as' => 'farm.pig.submit_sow_record', 'uses' => 'FarmController@addSowRecord']);
    Route::get('add_sow_record', ['as' => 'farm.pig.add_sow_record', 'uses' => 'FarmController@getAddSowRecordPage']);
    Route::get('add_boar_record', ['as' => 'farm.pig.add_boar_record', 'uses' => 'FarmController@getAddBoarRecordPage']);
    Route::post('submit_boar_record', ['as' => 'farm.pig.submit_boar_record', 'uses' => 'FarmController@addBoarRecord']);
    Route::get('add_sowlitter_record', ['as' => 'farm.pig.add_sowlitter_record', 'uses' => 'FarmController@getAddSowLitterRecordPage']);
    Route::get('animal_record', ['as' => 'farm.pig.animal_record', 'uses' => 'FarmController@getAnimalRecordPage']);
    Route::get('test_page', ['as' => 'farm.test', 'uses' => 'FarmController@getTestPage']);
    // Chicken and Duck Routes
  });

  // Route::group(['prefix' => 'admin'], function(){
  //   Route::get('/',['as' => 'farm.index', 'uses' => 'AdminController@index']);
  // });

});


// Socialite Routes
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout');
