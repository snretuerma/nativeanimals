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

    Route::get('dashboard', ['as' => 'farm.poultry.dashboard', 'uses' => 'PoultryController@getIndex']); // Make as landing page after login when doing backend for Native Chicken

    Route::get('add_to_breeder', ['as' => 'farm.poultry.page_add_to_breeder', 'uses' => 'FarmController@getPageAddToBreeder']);
    Route::get('create_family/{id}', ['as' => 'farm.poultry.create_family_id', 'uses' => 'FarmController@createFamily']);
    Route::get('add_to_family', ['as' => 'farm.poultry.add_to_family_animal', 'uses' => 'FarmController@addToFamily']);
    Route::get('daily_records', ['as' => 'farm.poultry.page_daily_records', 'uses' => 'FarmController@getDailyRecords']);

    Route::get('morphometric_characteristics', ['as' => 'farm.poultry.page_morphometric_characteristics', 'uses' => 'FarmController@getPageMorphometricCharacteristic']);
    Route::get('phenotypic_characteristics', ['as' => 'farm.poultry.page_phenotypic_characteristics', 'uses' => 'FarmController@getPagePhenotypicCharacteristic']);

    Route::get('replacement_individual_record', ['as' => 'farm.poultry.page_replacement_individual_record', 'uses' => 'PoultryController@getPageReplacementIndividualRecord']);
    Route::post('get_replacement_individual_record', ['as' => 'farm.poultry.get_replacement_individual_record', 'uses' => 'PoultryController@addReplacementIndividualRecord']);
    Route::get('replacement_search_id', ['as' => 'farm.poultry.page_phenomorphosearchid', 'uses' => 'FarmController@getPageSearchID']);
    Route::get('replacement_phenotypic/{id}', ['as' => 'farm.poultry.page_replacement_phenotypic_id', 'uses' => 'FarmController@getPageReplacementPhenotypic']);
    Route::post('fetch_replacement_phenotypic', ['as' => 'farm.poultry.fetch_replacement_phenotypic_id', 'uses' => 'FarmController@fetchDataReplacementPhenotypic']);
    Route::get('replacement_morphometric/{id}', ['as' => 'farm.poultry.page_replacement_morphometric_id', 'uses' => 'FarmController@getPageReplacementMorphometric']);
    Route::post('fetch_replacement_morphometric', ['as' => 'farm.poultry.fetch_replacement_morphometric_id', 'uses' => 'FarmController@fetchDataReplacementMorphometric']);
    Route::post('replacement_search_id_value', ['as' => 'farm.poultry.page_phenomorphosearchid_value', 'uses' => 'FarmController@searchID']);

    Route::get('feeding_records', ['as' => 'farm.poultry.page_feeding_records', 'uses' => 'FarmController@getPageFeedingRecords']);

    Route::post('feeding_records/submit', ['as' => 'farm.poultry.submit_feeding_records_id', 'uses' => 'FarmController@submitAnimalFeedingRecord']);

    Route::get('monthly_sales', ['as' => 'farm.poultry.page_monthly_sales', 'uses' => 'FarmController@getPageMonthlySales']);
    Route::post('addto_monthly_sales', ['as' => 'farm.poultry.addto_monthly_sales', 'uses' => 'FarmController@addToMonthlySales']);
    Route::post('addto_culled', ['as' => 'farm.poultry.addto_culled', 'uses' => 'FarmController@addToCulled']);

    Route::post('search_monthly_sales', ['as' => 'farm.chicken.search_monthly_sales', 'uses' => 'FarmController@searchMonthlySales']);




    Route::get('view_replacement', ['as' => 'farm.poultry.page_view_replacement', 'uses' => 'FarmController@getPageReplacementList']);
    Route::get('view_culled', ['as' => 'farm.poultry.page_view_culled', 'uses' => 'FarmController@getPageCulledList']);
    Route::get('view_sold', ['as' => 'farm.poultry.page_view_sold', 'uses' => 'FarmController@getPageSoldList']);


    Route::get('animal_record/{id}', ['as' => 'farm.poultry.animal_records_id', 'uses' => 'FarmController@displayAnimalInfo']);


    // Route::get('breeder_generation', ['as' => 'farm.poultry.generation', 'uses' => 'FarmController@generationPage']);

    // new Controller for poultry to Migrate all methods
    /********************** BREEDERS **********************/
    Route::get('breeder_generations', ['as' => 'farm.poultry.fetch_generation', 'uses' => 'PoultryController@fetchGeneration']);
    Route::post('breeder_add_generation', ['as' => 'farm.poultry.add_generation', 'uses' => 'PoultryController@createGeneration']);
    Route::post('breeder_edit_generation', ['as' => 'farm.poultry.breeder.edit_generation', 'uses' => 'PoultryController@editGeneration']);
    Route::post('fetch_family_record', ['as' => 'farm.poultry.submit_family_record', 'uses' => 'PoultryBreederController@getFamilyRecord']);
    Route::get('add_family/{generation}', ['as' => 'farm.poultry.add_family_display_lines', 'uses' => 'PoultryController@ajaxReturnLine']);
    Route::get('add_animals_to_family/{id}', ['as' => 'farm.chicken.add_animals_to_family', 'uses' => 'PoultryBreederController@addToCreatedFamily']);
    Route::get('add_family_menu', ['as' => 'farm.poultry.breeder.familymenu', 'uses' => 'PoultryBreederController@familyRecordsMenu']);
    Route::get('family_record', ['as' => 'farm.poultry.page_family_record', 'uses' => 'PoultryController@getPageFamilyRecord']);
    Route::get('add_family', ['as' => 'farm.poultry.page_add_family', 'uses' => 'PoultryBreederController@getAddFamily']);
    Route::get('add_animals_to_family/{id}/get_male', ['as' => 'farm.poultry.get_male', 'uses' => 'PoultryBreederController@showAvailableMales']);
    Route::post('add_male', ['as' => 'farm.poultry.add_male', 'uses' => 'PoultryBreederController@addMaleToFamily']);
    Route::get('add_animals_to_family/{id}/get_female', ['as' => 'farm.poultry.get_female', 'uses' => 'PoultryBreederController@showAvailableFemales']);
    Route::post('show_females', ['as' => 'farm.poultry.get_female_content', 'uses' => 'PoultryBreederController@getFemalePerFamily']);
    Route::post('add_female', ['as' => 'farm.poultry.add_female', 'uses' => 'PoultryBreederController@addFemaleToFamily']);

    Route::post('add_animals', ['as' => 'farm.poultry.page_add_animals', 'uses' => 'PoultryBreederController@addAnimalsToFamily']);

    // Daily Records
    Route::get('breeder_daily_records', ['as' => 'farm.poultry.breeder.daily', 'uses' => 'PoultryController@breederDailyRecords']);
    Route::post('fetch_breeder_daily_records', ['as' => 'farm.poultry.breeder.fetch.daily', 'uses' => 'PoultryController@fetchBreederDailyRecords']);
    Route::get('breeder_daily_records/member_list', ['as' => 'farm.poultry.breeder.daily_members', 'uses' => 'PoultryController@dailyFamilyMembers']);
    Route::get('breeder/familylist_daily_record', ['as' => 'farm.poultry.breeder.family_daily_records', 'uses' => 'PoultryBreederController@familylistDailyRecords']);
    Route::get('breeder/daily_records/{id}', ['as' => 'farm.poultry.breeder.daily_records', 'uses' => 'PoultryBreederController@dailyRecords']);
    Route::get('breeder/daily_records/egg_production/{id}', ['as' => 'farm.poultry.breeder.daily_records_egg_prod', 'uses' => 'PoultryBreederController@eggProductionForm']);
    Route::post('breeder/daily_records/egg_production/submit', ['as' => 'farm.poultry.breeder.daily_records_egg_prod_submit', 'uses' => 'PoultryBreederController@eggProductionSubmit']);
    Route::get('breeder/daily_records/egg_production/edit/{id}', ['as' => 'farm.poultry.breeder.daily_records_egg_prod_edit', 'uses' => 'PoultryBreederController@eggProductionEditForm']);
    Route::put('breeder/daily_records/egg_production/edit/edit_submit', ['as' => 'farm.poultry.breeder.daily_records_egg_prod_edit_submit', 'uses' => 'PoultryBreederController@eggProductionEditFormSubmit']);
    Route::delete('breeder/daily_records/egg_production/edit/delete', ['as' => 'farm.poultry.breeder.daily_records_egg_prod_delete', 'uses' => 'PoultryBreederController@eggProductionDeleteRecord']);
    Route::get('breeder/daily_records/feeding_record/{id}', ['as' => 'farm.poultry.breeder.daily_records_feeding_record', 'uses' => 'PoultryBreederController@feedingRecordForm']);
    Route::post('breeder/daily_records/feeding_record/submit', ['as' => 'farm.poultry.breeder.daily_records_feeding_record_submit', 'uses' => 'PoultryBreederController@feedingRecordSubmit']);
    Route::get('breeder/daily_records/feeding_record/edit/{id}', ['as' => 'farm.poultry.breeder.daily_records_feeding_record_edit', 'uses' => 'PoultryBreederController@feedingRecordEditForm']);
    Route::put('breeder/daily_records/feeding_record/edit/edit_submit', ['as' => 'farm.poultry.breeder.daily_records_feeding_record_edit_submit', 'uses' => 'PoultryBreederController@feedingRecordEditFormSubmit']);
    Route::delete('breeder/daily_records/feeding_record/edit/delete', ['as' => 'farm.poultry.breeder.daily_records_feeding_record_delete', 'uses' => 'PoultryBreederController@feedingRecordDeleteRecord']);

    // Egg Quality
    Route::get('egg_quality_family_list', ['as' => 'farm.poultry.page_egg_quality_familylist', 'uses' => 'PoultryBreederController@familylistEggQuality']);
    Route::get('egg_quality_family_log/{id}', ['as' => 'farm.poultry.page_egg_quality_family_log', 'uses' => 'PoultryBreederController@eggQualityRecords']);
    Route::get('egg_quality_family_form/{id}', ['as' => 'farm.poultry.page_egg_quality_family_form', 'uses' => 'PoultryBreederController@eggQualityForm']);
    Route::post('egg_quality_family_form/submit', ['as' => 'farm.poultry.page_egg_quality_family_form_submit', 'uses' => 'PoultryBreederController@eggQualityFormSubmit']);
    Route::get('egg_quality_family_edit/{id}', ['as' => 'farm.poultry.page_egg_quality_family_edit', 'uses' => 'PoultryBreederController@eggQualityFormEdit']);
    Route::put('egg_quality_family_edit/submit', ['as' => 'farm.poultry.page_egg_quality_family_form_submit_edit', 'uses' => 'PoultryBreederController@eggQualityFormEditSubmit']);
    Route::delete('egg_quality_family_delete', ['as' => 'farm.poultry.page_egg_quality_family_form_delete', 'uses' => 'PoultryBreederController@eggQualityFormDelete']);


    Route::get('egg_quality/{id}', ['as' => 'farm.poultry.page_egg_quality', 'uses' => 'PoultryController@getPageEggQuality']);
    Route::post('fetch_egg_quality', ['as' => 'farm.poultry.fetch_egg_quality', 'uses' => 'PoultryController@fetchEggQuality']);
    Route::get('egg_quality/{generation}', ['as' => 'farm.poultry.egg_quality_display_lines', 'uses' => 'PoultryController@eggQualityReturnLine']);
    Route::get('egg_quality/line/{line}', ['as' => 'farm.poultry.egg_quality_display_family', 'uses' => 'PoultryController@eggQualityReturnFamily']);

    Route::get('view_breeders', ['as' => 'farm.poultry.page_view_breeders', 'uses' => 'PoultryController@getPageBreederList']);
    Route::get('view_breeders_family/{id}', ['as' => 'farm.poultry.page_view_breeders_family', 'uses' => 'PoultryController@getPageBreederFamilySummary']);
    Route::get('view_breeders_individual/{id}', ['as' => 'farm.poultry.page_view_breeders_individual_list', 'uses' => 'PoultryController@getPageBreederIndividualList']);
    Route::get('view_breeders_individual_data/{id}', ['as' => 'farm.poultry.page_view_breeders_individual_data', 'uses' => 'PoultryController@getPageIndividualData']);

    // Hatchery Parameters
    Route::get('hatchery_family_list', ['as' => 'farm.poultry.hatchery_familylist', 'uses' => 'PoultryBreederController@hatcheryFamilyList']);
    Route::get('hatchery_family_log/{id}', ['as' => 'farm.poultry.hatchery_family_log', 'uses' => 'PoultryBreederController@hatcheryFamilyLogs']);
    Route::get('hatchery_family_form1/{id}', ['as' => 'farm.poultry.hatchery_form1', 'uses' => 'PoultryBreederController@hatcheryPartialForm1']);
    Route::post('hatchery_family_form1_submit', ['as' => 'farm.poultry.hatchery_form1_submit', 'uses' => 'PoultryBreederController@hatcheryPartialForm1Submit']);
    Route::get('hatchery_family_form2/{id}', ['as' => 'farm.poultry.hatchery_form2', 'uses' => 'PoultryBreederController@hatcheryPartialForm2']);
    Route::put('hatchery_family_form2_submit', ['as' => 'farm.poultry.hatchery_form2_submit', 'uses' => 'PoultryBreederController@hatcheryPartialForm2Submit']);
    Route::get('hatchery_family_form3/{id}', ['as' => 'farm.poultry.hatchery_form3', 'uses' => 'PoultryBreederController@hatcheryPartialForm3']);
    Route::put('hatchery_family_form3_submit', ['as' => 'farm.poultry.hatchery_form3_submit', 'uses' => 'PoultryBreederController@hatcheryPartialForm3Submit']);

    Route::get('hatchery_family_log_delete/{id}', ['as' => 'farm.poultry.hatchery_family_delete', 'uses' => 'PoultryBreederController@hatcheryFamilyLogsDelete']);


    // Replacement
    Route::get('replacement_individual_record/{generation}', ['as' => 'farm.poultry.fetch_line', 'uses' => 'PoultryReplacementController@fetchLine']);
    Route::get('replacement_individual_record/line/{line}', ['as' => 'farm.poultry.fetch_family', 'uses' => 'PoultryReplacementController@fetchFamily']);

    // Route::get('replacement_feeding_list', ['as' => 'farm.poultry.replacement.feeding_list', 'uses' => 'PoultryController@replacementFeedingList']);
    // Route::get('replacement_feeding_form/{id}', ['as' => 'farm.poultry.replacement.feeding_form', 'uses' => 'PoultryController@replacementFeedingForm']);


    Route::get('replacement_feeding_record_list', ['as' => 'farm.poultry.replacement.feeding_record_list', 'uses' => 'PoultryReplacementController@feedingRecordList']);
    Route::get('replacement_feeding_record_log/{id}', ['as' => 'farm.poultry.replacement.feeding_record_log', 'uses' => 'PoultryReplacementController@feedingRecordLog']);
    Route::get('replacement_feeding_record_form/{id}', ['as' => 'farm.poultry.replacement.feeding_record_form', 'uses' => 'PoultryReplacementController@feedingRecordForm']);
    Route::post('replacement_feeding_fetch', ['as' => 'farm.poultry.replacement.feeding_fetch', 'uses' => 'PoultryReplacementController@feedingFetchData']);
    Route::get('replacement_feeding_record_edit/{id}', ['as' => 'farm.poultry.replacement.feeding_record_edit', 'uses' => 'PoultryReplacementController@feedingRecordEdit']);
    Route::put('replacement_feeding_edit_submit', ['as' => 'farm.poultry.replacement.feeding_edit_submit', 'uses' => 'PoultryReplacementController@feedingFetchDataEdit']);
    Route::delete('replacement_feeding_edit_delete', ['as' => 'farm.poultry.replacement.feeding_edit_delete', 'uses' => 'PoultryReplacementController@feedingFetchDataDelete']);

    // Brooders and Growers
    Route::get('hatchery_parameters', ['as' => 'farm.poultry.page_hatchery_parameters', 'uses' => 'PoultryController@getPageHatcheryParameter']);
    Route::post('fetch_hatchery_parameters', ['as' => 'farm.poultry.fetch_hatchery_parameters', 'uses' => 'PoultryController@fetchHatcheryParameter']);
    Route::get('complete_hatchery_list', ['as' => 'farm.poultry.complete_hatchery_list', 'uses' => 'PoultryController@completeHatcheryRecordList']);
    Route::get('complete_hatchery_form/{id}', ['as' => 'farm.poultry.complete_hatchery_page', 'uses' => 'PoultryController@completeHatcheryRecordPage']);
    Route::post('complete_hatchery', ['as' => 'farm.poultry.complete_hatchery', 'uses' => 'PoultryController@completeHatcheryRecord']);

    Route::get('growth_performance', ['as' => 'farm.poultry.page_replacement_growth_performance', 'uses' => 'PoultryController@getPageReplacementGrowthPerformance']);
    Route::get('growth_performance/{id}/{record}', ['as' => 'farm.poultry.replacement_growth_performance_id', 'uses' => 'PoultryController@getPageReplacementGrowthPerformanceId']);
    Route::post('growth_performance_save', ['as' => 'farm.poultry.replacement_growth_performance_save', 'uses' => 'PoultryController@fetchReplacementGrowthPerformance']);

    Route::get('broodersgrowers_feedinglist', ['as' => 'farm.poultry.broodersgrowers_feedinglist', 'uses' => 'PoultryController@getPageBroodersGrowersFeedingList']);
    Route::get('broodersgrowers_feedingrecord/{id}/{record}', ['as' => 'farm.poultry.broodersgrowers_feedingrecord', 'uses' => 'PoultryController@getPageBroodersGrowersFeedingRecord']);
    Route::post('broodersgrowers_feedingrecord', ['as' => 'farm.poultry.submit_broodersgrowers_feedingrecord', 'uses' => 'PoultryController@broodersGrowersFeedingRecord']);


    // Others
    Route::get('create_pens_page', ['as' => 'farm.poultry.create_pens_page', 'uses' => 'PoultryController@createPensPage']);
    Route::get('get_all_pens', ['as' => 'farm.poultry.get_all_pens', 'uses' => 'PoultryController@getAllPens']);
    Route::post('create_pens', ['as' => 'farm.poultry.create_pens', 'uses' => 'PoultryController@createPens']);

    Route::get('removal_menu',['as' => 'farm.poultry.removal_menu', 'uses' => 'PoultryController@removalMenuPage']);
    Route::get('breeder_family_removal_list', ['as' => 'farm.poultry.breeder_family_removal_list', 'uses' => 'PoultryController@breederFamilyRemovalList']);
    Route::get('breeder_removal_list_culling/{id}', ['as' => 'farm.poultry.breeder_removal_list_culling', 'uses' => 'PoultryController@breederCullingRemovalList']);
    Route::post('breeder_removal_list_culling_submit', ['as' => 'farm.poultry.breeder_removal_list_culling_submit', 'uses' => 'PoultryController@breederCullingRemovalListSubmit']);
    Route::get('breeder_removal_list_mortality/{id}', ['as' => 'farm.poultry.breeder_removal_list_mortality', 'uses' => 'PoultryController@breederMortalityRemovalList']);
    Route::post('breeder_removal_list_mortality_submit', ['as' => 'farm.poultry.breeder_removal_list_mortality_submit', 'uses' => 'PoultryController@breederMortalityRemovalListSubmit']);
    Route::get('breeder_removal_list_sales/{id}', ['as' => 'farm.poultry.breeder_removal_list_sales', 'uses' => 'PoultryController@breederSalesRemovalList']);
    Route::post('breeder_removal_list_sales_submit', ['as' => 'farm.poultry.breeder_removal_list_sales_submit', 'uses' => 'PoultryController@breederSalesRemovalListSubmit']);
    Route::get('replacement_family_removal_list', ['as' => 'farm.poultry.replacement_family_removal_list', 'uses' => 'PoultryController@replacementFamilyRemovalList']);
    Route::get('replacement_removal_list_culling/{id}', ['as' => 'farm.poultry.replacement_removal_list_culling', 'uses' => 'PoultryController@replacementCullingRemovalList']);
    Route::post('replacement_removal_list_culling_submit', ['as' => 'farm.poultry.replacement_removal_list_culling_submit', 'uses' => 'PoultryController@replacementCullingRemovalListSubmit']);
    Route::get('replacement_removal_list_mortality/{id}', ['as' => 'farm.poultry.replacement_removal_list_mortality', 'uses' => 'PoultryController@replacementMortalityRemovalList']);
    Route::post('replacement_removal_list_mortality_submit', ['as' => 'farm.poultry.replacement_removal_list_mortality_submit', 'uses' => 'PoultryController@replacementMortalityRemovalListSubmit']);
    Route::get('replacement_removal_list_sales/{id}', ['as' => 'farm.poultry.replacement_removal_list_sales', 'uses' => 'PoultryController@replacementSalesRemovalList']);
    Route::post('replacement_removal_list_sales_submit', ['as' => 'farm.poultry.replacement_removal_list_sales_submit', 'uses' => 'PoultryController@replacementSalesRemovalListSubmit']);

    Route::get('replacement_removal_list', ['as' => 'farm.poultry.replacement_removal_list', 'uses' => 'PoultryController@replacementRemovalList']);
    Route::get('broodersgrowers_removal_list', ['as' => 'farm.poultry.broodersgrowers_removal_list', 'uses' => 'PoultryController@broodersgrowersRemovalList']);
    Route::get('removal_sales_form/{id}/{type}', ['as' => 'farm.poultry.removal_sales_form', 'uses' => 'PoultryController@removalSalesForm']);
    Route::post('removal_sales_submit', ['as' => 'farm.poultry.removal_sales_submit', 'uses' => 'PoultryController@submitSalesForm']);
    Route::get('removal_culling_form/{id}/{type}', ['as' => 'farm.poultry.removal_culling_form', 'uses' => 'PoultryController@removalCullingForm']);
    Route::post('removal_culling_submit', ['as' => 'farm.poultry.removal_culling_submit', 'uses' => 'PoultryController@submitCullingForm']);
    Route::get('removal_mortality_form/{id}/{type}', ['as' => 'farm.poultry.removal_mortality_form', 'uses' => 'PoultryController@removalMortalityForm']);
    // Farm Properties
  });

  // Route::group(['prefix' => 'admin'], function(){
  //   Route::get('/',['as' => 'farm.index', 'uses' => 'AdminController@index']);
  // });

});


// Socialite Routes
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout');
