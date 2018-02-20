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
    // Chicken and Duck Routes
    Route::get('test_page', ['as' => 'farm.test', 'uses' => 'FarmController@getTestPage']);

    Route::get('dashboard', ['as' => 'farm.poultry.dashboard', 'uses' => 'FarmController@getIndex']); // Make as landing page after login when doing backend for Native Chicken
    Route::get('family_record', ['as' => 'farm.poultry.page_family_record', 'uses' => 'FarmController@getPageFamilyRecord']);
    Route::get('add_to_breeder', ['as' => 'farm.poultry.page_add_to_breeder', 'uses' => 'FarmController@getPageAddToBreeder']);
    Route::get('create_family/{id}', ['as' => 'farm.poultry.create_family_id', 'uses' => 'FarmController@createFamily']);
    Route::get('add_to_family', ['as' => 'farm.poultry.add_to_family_animal', 'uses' => 'FarmController@addToFamily']);
    Route::get('daily_records', ['as' => 'farm.poultry.page_daily_records', 'uses' => 'FarmController@getDailyRecords']);
    Route::get('egg_quality', ['as' => 'farm.poultry.page_egg_quality', 'uses' => 'FarmController@getPageEggQuality']);
    Route::get('hatchery_parameters', ['as' => 'farm.poultry.page_hatchery_parameters', 'uses' => 'FarmController@getPageHatcheryParameter']);
    Route::get('morphometric_characteristics', ['as' => 'farm.poultry.page_morphometric_characteristics', 'uses' => 'FarmController@getPageMorphometricCharacteristic']);
    Route::get('phenotypic_characteristics', ['as' => 'farm.poultry.page_phenotypic_characteristics', 'uses' => 'FarmController@getPagePhenotypicCharacteristic']);

    Route::get('replacement_individual_record', ['as' => 'farm.poultry.page_replacement_individual_record', 'uses' => 'FarmController@getPageReplacementIndividualRecord']);
    Route::post('get_replacement_individual_record', ['as' => 'farm.poultry.get_replacement_individual_record', 'uses' => 'FarmController@addReplacementIndividualRecord']);
    Route::get('replacement_growth_performance', ['as' => 'farm.poultry.page_replacement_growth_performance', 'uses' => 'FarmController@getPageReplacementGrowthPerformance']);
    Route::get('replacement_search_id', ['as' => 'farm.poultry.page_phenomorphosearchid', 'uses' => 'FarmController@getPageSearchID']);
    Route::get('replacement_phenotypic/{id}', ['as' => 'farm.poultry.page_replacement_phenotypic_id', 'uses' => 'FarmController@getPageReplacementPhenotypic']);
    Route::post('fetch_replacement_phenotypic', ['as' => 'farm.poultry.fetch_replacement_phenotypic_id', 'uses' => 'FarmController@fetchDataReplacementPhenotypic']);
    Route::get('replacement_morphometric/{id}', ['as' => 'farm.poultry.page_replacement_morphometric_id', 'uses' => 'FarmController@getPageReplacementMorphometric']);
    Route::post('fetch_replacement_morphometric', ['as' => 'farm.poultry.fetch_replacement_morphometric_id', 'uses' => 'FarmController@fetchDataReplacementMorphometric']);
    Route::post('replacement_search_id_value', ['as' => 'farm.poultry.page_phenomorphosearchid_value', 'uses' => 'FarmController@searchID']);

    Route::get('feeding_records', ['as' => 'farm.poultry.page_feeding_records', 'uses' => 'FarmController@getPageFeedingRecords']);
    Route::get('feeding_records/{id}', ['as' => 'farm.poultry.page_feeding_records_id', 'uses' => 'FarmController@getPageAnimalFeedingRecord']);
    Route::post('feeding_records/submit', ['as' => 'farm.poultry.submit_feeding_records_id', 'uses' => 'FarmController@submitAnimalFeedingRecord']);

    Route::get('monthly_sales', ['as' => 'farm.poultry.page_monthly_sales', 'uses' => 'FarmController@getPageMonthlySales']);
    Route::post('addto_monthly_sales', ['as' => 'farm.poultry.addto_monthly_sales', 'uses' => 'FarmController@addToMonthlySales']);
    Route::post('addto_culled', ['as' => 'farm.poultry.addto_culled', 'uses' => 'FarmController@addToCulled']);


    Route::post('fetch_family_record', ['as' => 'farm.chicken.submit_family_record', 'uses' => 'FarmController@getFamilyRecord']);
    Route::post('search_monthly_sales', ['as' => 'farm.chicken.search_monthly_sales', 'uses' => 'FarmController@searchMonthlySales']);

    Route::get('view_breeders', ['as' => 'farm.poultry.page_view_breeders', 'uses' => 'FarmController@getPageBreederList']);
    Route::get('view_breeders_family', ['as' => 'farm.poultry.page_view_breeders_family', 'uses' => 'FarmController@getPageBreederFamilyList']);
    Route::get('view_breeders_individual_list', ['as' => 'farm.poultry.page_view_breeders_individual_list', 'uses' => 'FarmController@getPageBreederIndividualList']);
    Route::get('view_breeders_individual_data', ['as' => 'farm.poultry.page_view_breeders_individual_data', 'uses' => 'FarmController@getPageIndividualData']);

    Route::get('view_replacement', ['as' => 'farm.poultry.page_view_replacement', 'uses' => 'FarmController@getPageReplacementList']);
    Route::get('view_culled', ['as' => 'farm.poultry.page_view_culled', 'uses' => 'FarmController@getPageCulledList']);
    Route::get('view_sold', ['as' => 'farm.poultry.page_view_sold', 'uses' => 'FarmController@getPageSoldList']);
    Route::get('add_family_menu', ['as' => 'farm.poultry.breeder.familymenu', 'uses' => 'FarmController@breederFamilyRecords']);



    Route::get('animal_record/{id}', ['as' => 'farm.poultry.animal_records_id', 'uses' => 'FarmController@displayAnimalInfo']);


    // New Views
    Route::get('breeder_generation', ['as' => 'farm.poultry.generation', 'uses' => 'FarmController@generationPage']);
    Route::post('breeder_add_generation', ['as' => 'farm.poultry.add_generation', 'uses' => 'FarmController@addGeneration']);
    Route::post('breeder_edit_generation', ['as' => 'farm.poultry.breeder.edit_generation', 'uses' => 'FarmController@editGeneration']);

    Route::get('breeder_daily_records', ['as' => 'farm.poultry.breeder.daily', 'uses' => 'FarmController@breederDailyRecords']);

  });

  // Route::group(['prefix' => 'admin'], function(){
  //   Route::get('/',['as' => 'farm.index', 'uses' => 'AdminController@index']);
  // });

});


// Socialite Routes
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout');
