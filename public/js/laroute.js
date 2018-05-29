(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"App\Http\Controllers\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"App\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":null,"action":"App\Http\Controllers\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"home","name":"home","action":"App\Http\Controllers\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"farm","name":"farm.index","action":"App\Http\Controllers\FarmController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/add_sow_record","name":"farm.pig.add_sow_record","action":"App\Http\Controllers\FarmController@getAddSowRecordPage"},{"host":null,"methods":["POST"],"uri":"farm\/submit_sow_record","name":"farm.pig.submit_sow_record","action":"App\Http\Controllers\FarmController@addSowRecord"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/add_boar_record","name":"farm.pig.add_boar_record","action":"App\Http\Controllers\FarmController@getAddBoarRecordPage"},{"host":null,"methods":["POST"],"uri":"farm\/submit_boar_record","name":"farm.pig.submit_boar_record","action":"App\Http\Controllers\FarmController@addBoarRecord"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/add_sowlitter_record","name":"farm.pig.add_sowlitter_record","action":"App\Http\Controllers\FarmController@getAddSowLitterRecordPage"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/animal_record","name":"farm.pig.animal_record","action":"App\Http\Controllers\FarmController@getAnimalRecordPage"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/test_page","name":"farm.test","action":"App\Http\Controllers\FarmController@getTestPage"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/dashboard","name":"farm.poultry.dashboard","action":"App\Http\Controllers\PoultryController@getIndex"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/add_to_breeder","name":"farm.poultry.page_add_to_breeder","action":"App\Http\Controllers\FarmController@getPageAddToBreeder"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/create_family\/{id}","name":"farm.poultry.create_family_id","action":"App\Http\Controllers\FarmController@createFamily"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/add_to_family","name":"farm.poultry.add_to_family_animal","action":"App\Http\Controllers\FarmController@addToFamily"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/daily_records","name":"farm.poultry.page_daily_records","action":"App\Http\Controllers\FarmController@getDailyRecords"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/morphometric_characteristics","name":"farm.poultry.page_morphometric_characteristics","action":"App\Http\Controllers\FarmController@getPageMorphometricCharacteristic"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/phenotypic_characteristics","name":"farm.poultry.page_phenotypic_characteristics","action":"App\Http\Controllers\FarmController@getPagePhenotypicCharacteristic"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/replacement_individual_record","name":"farm.poultry.page_replacement_individual_record","action":"App\Http\Controllers\PoultryController@getPageReplacementIndividualRecord"},{"host":null,"methods":["POST"],"uri":"farm\/get_replacement_individual_record","name":"farm.poultry.get_replacement_individual_record","action":"App\Http\Controllers\PoultryController@addReplacementIndividualRecord"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/replacement_search_id","name":"farm.poultry.page_phenomorphosearchid","action":"App\Http\Controllers\FarmController@getPageSearchID"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/replacement_phenotypic\/{id}","name":"farm.poultry.page_replacement_phenotypic_id","action":"App\Http\Controllers\FarmController@getPageReplacementPhenotypic"},{"host":null,"methods":["POST"],"uri":"farm\/fetch_replacement_phenotypic","name":"farm.poultry.fetch_replacement_phenotypic_id","action":"App\Http\Controllers\FarmController@fetchDataReplacementPhenotypic"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/replacement_morphometric\/{id}","name":"farm.poultry.page_replacement_morphometric_id","action":"App\Http\Controllers\FarmController@getPageReplacementMorphometric"},{"host":null,"methods":["POST"],"uri":"farm\/fetch_replacement_morphometric","name":"farm.poultry.fetch_replacement_morphometric_id","action":"App\Http\Controllers\FarmController@fetchDataReplacementMorphometric"},{"host":null,"methods":["POST"],"uri":"farm\/replacement_search_id_value","name":"farm.poultry.page_phenomorphosearchid_value","action":"App\Http\Controllers\FarmController@searchID"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/feeding_records","name":"farm.poultry.page_feeding_records","action":"App\Http\Controllers\FarmController@getPageFeedingRecords"},{"host":null,"methods":["POST"],"uri":"farm\/feeding_records\/submit","name":"farm.poultry.submit_feeding_records_id","action":"App\Http\Controllers\FarmController@submitAnimalFeedingRecord"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/monthly_sales","name":"farm.poultry.page_monthly_sales","action":"App\Http\Controllers\FarmController@getPageMonthlySales"},{"host":null,"methods":["POST"],"uri":"farm\/addto_monthly_sales","name":"farm.poultry.addto_monthly_sales","action":"App\Http\Controllers\FarmController@addToMonthlySales"},{"host":null,"methods":["POST"],"uri":"farm\/addto_culled","name":"farm.poultry.addto_culled","action":"App\Http\Controllers\FarmController@addToCulled"},{"host":null,"methods":["POST"],"uri":"farm\/search_monthly_sales","name":"farm.chicken.search_monthly_sales","action":"App\Http\Controllers\FarmController@searchMonthlySales"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/view_replacement","name":"farm.poultry.page_view_replacement","action":"App\Http\Controllers\FarmController@getPageReplacementList"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/view_culled","name":"farm.poultry.page_view_culled","action":"App\Http\Controllers\FarmController@getPageCulledList"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/view_sold","name":"farm.poultry.page_view_sold","action":"App\Http\Controllers\FarmController@getPageSoldList"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/animal_record\/{id}","name":"farm.poultry.animal_records_id","action":"App\Http\Controllers\FarmController@displayAnimalInfo"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/breeder_generations","name":"farm.poultry.fetch_generation","action":"App\Http\Controllers\PoultryController@fetchGeneration"},{"host":null,"methods":["POST"],"uri":"farm\/breeder_add_generation","name":"farm.poultry.add_generation","action":"App\Http\Controllers\PoultryController@createGeneration"},{"host":null,"methods":["POST"],"uri":"farm\/breeder_edit_generation","name":"farm.poultry.breeder.edit_generation","action":"App\Http\Controllers\PoultryController@editGeneration"},{"host":null,"methods":["POST"],"uri":"farm\/fetch_family_record","name":"farm.poultry.submit_family_record","action":"App\Http\Controllers\PoultryBreederController@getFamilyRecord"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/add_family\/{generation}","name":"farm.poultry.add_family_display_lines","action":"App\Http\Controllers\PoultryController@ajaxReturnLine"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/add_animals_to_family\/{id}","name":"farm.chicken.add_animals_to_family","action":"App\Http\Controllers\PoultryBreederController@addToCreatedFamily"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/add_family_menu","name":"farm.poultry.breeder.familymenu","action":"App\Http\Controllers\PoultryBreederController@familyRecordsMenu"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/family_record","name":"farm.poultry.page_family_record","action":"App\Http\Controllers\PoultryController@getPageFamilyRecord"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/add_family","name":"farm.poultry.page_add_family","action":"App\Http\Controllers\PoultryBreederController@getAddFamily"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/add_animals_to_family\/{id}\/get_male","name":"farm.poultry.get_male","action":"App\Http\Controllers\PoultryBreederController@showAvailableMales"},{"host":null,"methods":["POST"],"uri":"farm\/add_male","name":"farm.poultry.add_male","action":"App\Http\Controllers\PoultryBreederController@addMaleToFamily"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/get_female","name":"farm.poultry.get_female","action":"App\Http\Controllers\PoultryBreederController@showAvailableFemales"},{"host":null,"methods":["POST"],"uri":"farm\/add_female","name":"farm.poultry.add_female","action":"App\Http\Controllers\PoultryBreederController@addFemaleToFamily"},{"host":null,"methods":["POST"],"uri":"farm\/add_animals","name":"farm.poultry.page_add_animals","action":"App\Http\Controllers\PoultryBreederController@addAnimalsToFamily"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/breeder_daily_records","name":"farm.poultry.breeder.daily","action":"App\Http\Controllers\PoultryController@breederDailyRecords"},{"host":null,"methods":["POST"],"uri":"farm\/fetch_breeder_daily_records","name":"farm.poultry.breeder.fetch.daily","action":"App\Http\Controllers\PoultryController@fetchBreederDailyRecords"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/breeder_daily_records\/member_list","name":"farm.poultry.breeder.daily_members","action":"App\Http\Controllers\PoultryController@dailyFamilyMembers"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/egg_quality","name":"farm.poultry.page_egg_quality","action":"App\Http\Controllers\PoultryController@getPageEggQuality"},{"host":null,"methods":["POST"],"uri":"farm\/fetch_egg_quality","name":"farm.poultry.fetch_egg_quality","action":"App\Http\Controllers\PoultryController@fetchEggQuality"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/egg_quality\/{generation}","name":"farm.poultry.egg_quality_display_lines","action":"App\Http\Controllers\PoultryController@eggQualityReturnLine"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/egg_quality\/line\/{line}","name":"farm.poultry.egg_quality_display_family","action":"App\Http\Controllers\PoultryController@eggQualityReturnFamily"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/view_breeders","name":"farm.poultry.page_view_breeders","action":"App\Http\Controllers\PoultryController@getPageBreederList"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/view_breeders_family\/{id}","name":"farm.poultry.page_view_breeders_family","action":"App\Http\Controllers\PoultryController@getPageBreederFamilySummary"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/view_breeders_individual\/{id}","name":"farm.poultry.page_view_breeders_individual_list","action":"App\Http\Controllers\PoultryController@getPageBreederIndividualList"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/view_breeders_individual_data\/{id}","name":"farm.poultry.page_view_breeders_individual_data","action":"App\Http\Controllers\PoultryController@getPageIndividualData"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/replacement_feeding_list","name":"farm.poultry.replacement.feeding_list","action":"App\Http\Controllers\PoultryController@replacementFeedingList"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/replacement_feeding_form\/{id}","name":"farm.poultry.replacement.feeding_form","action":"App\Http\Controllers\PoultryController@replacementFeedingForm"},{"host":null,"methods":["POST"],"uri":"farm\/replacement_feeding_fetch","name":"farm.poultry.replacement.feeding_fetch","action":"App\Http\Controllers\PoultryController@replacementFeedingFetchData"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/hatchery_parameters","name":"farm.poultry.page_hatchery_parameters","action":"App\Http\Controllers\PoultryController@getPageHatcheryParameter"},{"host":null,"methods":["POST"],"uri":"farm\/fetch_hatchery_parameters","name":"farm.poultry.fetch_hatchery_parameters","action":"App\Http\Controllers\PoultryController@fetchHatcheryParameter"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/complete_hatchery_list","name":"farm.poultry.complete_hatchery_list","action":"App\Http\Controllers\PoultryController@completeHatcheryRecordList"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/complete_hatchery_form\/{id}","name":"farm.poultry.complete_hatchery_page","action":"App\Http\Controllers\PoultryController@completeHatcheryRecordPage"},{"host":null,"methods":["POST"],"uri":"farm\/complete_hatchery","name":"farm.poultry.complete_hatchery","action":"App\Http\Controllers\PoultryController@completeHatcheryRecord"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/growth_performance","name":"farm.poultry.page_replacement_growth_performance","action":"App\Http\Controllers\PoultryController@getPageReplacementGrowthPerformance"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/growth_performance\/{id}\/{record}","name":"farm.poultry.replacement_growth_performance_id","action":"App\Http\Controllers\PoultryController@getPageReplacementGrowthPerformanceId"},{"host":null,"methods":["POST"],"uri":"farm\/growth_performance_save","name":"farm.poultry.replacement_growth_performance_save","action":"App\Http\Controllers\PoultryController@fetchReplacementGrowthPerformance"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/broodersgrowers_feedinglist","name":"farm.poultry.broodersgrowers_feedinglist","action":"App\Http\Controllers\PoultryController@getPageBroodersGrowersFeedingList"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/broodersgrowers_feedingrecord\/{id}\/{record}","name":"farm.poultry.broodersgrowers_feedingrecord","action":"App\Http\Controllers\PoultryController@getPageBroodersGrowersFeedingRecord"},{"host":null,"methods":["POST"],"uri":"farm\/broodersgrowers_feedingrecord","name":"farm.poultry.submit_broodersgrowers_feedingrecord","action":"App\Http\Controllers\PoultryController@broodersGrowersFeedingRecord"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/create_pens_page","name":"farm.poultry.create_pens_page","action":"App\Http\Controllers\PoultryController@createPensPage"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/get_all_pens","name":"farm.poultry.get_all_pens","action":"App\Http\Controllers\PoultryController@getAllPens"},{"host":null,"methods":["POST"],"uri":"farm\/create_pens","name":"farm.poultry.create_pens","action":"App\Http\Controllers\PoultryController@createPens"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/removal_menu","name":"farm.poultry.removal_menu","action":"App\Http\Controllers\PoultryController@removalMenuPage"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/breeder_family_removal_list","name":"farm.poultry.breeder_family_removal_list","action":"App\Http\Controllers\PoultryController@breederFamilyRemovalList"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/breeder_removal_list_culling\/{id}","name":"farm.poultry.breeder_removal_list_culling","action":"App\Http\Controllers\PoultryController@breederCullingRemovalList"},{"host":null,"methods":["POST"],"uri":"farm\/breeder_removal_list_culling_submit","name":"farm.poultry.breeder_removal_list_culling_submit","action":"App\Http\Controllers\PoultryController@breederCullingRemovalListSubmit"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/breeder_removal_list_mortality\/{id}","name":"farm.poultry.breeder_removal_list_mortality","action":"App\Http\Controllers\PoultryController@breederMortalityRemovalList"},{"host":null,"methods":["POST"],"uri":"farm\/breeder_removal_list_mortality_submit","name":"farm.poultry.breeder_removal_list_mortality_submit","action":"App\Http\Controllers\PoultryController@breederMortalityRemovalListSubmit"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/breeder_removal_list_sales\/{id}","name":"farm.poultry.breeder_removal_list_sales","action":"App\Http\Controllers\PoultryController@breederSalesRemovalList"},{"host":null,"methods":["POST"],"uri":"farm\/breeder_removal_list_sales_submit","name":"farm.poultry.breeder_removal_list_sales_submit","action":"App\Http\Controllers\PoultryController@breederSalesRemovalListSubmit"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/replacement_family_removal_list","name":"farm.poultry.replacement_family_removal_list","action":"App\Http\Controllers\PoultryController@replacementFamilyRemovalList"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/replacement_removal_list_culling\/{id}","name":"farm.poultry.replacement_removal_list_culling","action":"App\Http\Controllers\PoultryController@replacementCullingRemovalList"},{"host":null,"methods":["POST"],"uri":"farm\/replacement_removal_list_culling_submit","name":"farm.poultry.replacement_removal_list_culling_submit","action":"App\Http\Controllers\PoultryController@replacementCullingRemovalListSubmit"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/replacement_removal_list_mortality\/{id}","name":"farm.poultry.replacement_removal_list_mortality","action":"App\Http\Controllers\PoultryController@replacementMortalityRemovalList"},{"host":null,"methods":["POST"],"uri":"farm\/replacement_removal_list_mortality_submit","name":"farm.poultry.replacement_removal_list_mortality_submit","action":"App\Http\Controllers\PoultryController@replacementMortalityRemovalListSubmit"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/replacement_removal_list_sales\/{id}","name":"farm.poultry.replacement_removal_list_sales","action":"App\Http\Controllers\PoultryController@replacementSalesRemovalList"},{"host":null,"methods":["POST"],"uri":"farm\/replacement_removal_list_sales_submit","name":"farm.poultry.replacement_removal_list_sales_submit","action":"App\Http\Controllers\PoultryController@replacementSalesRemovalListSubmit"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/replacement_removal_list","name":"farm.poultry.replacement_removal_list","action":"App\Http\Controllers\PoultryController@replacementRemovalList"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/broodersgrowers_removal_list","name":"farm.poultry.broodersgrowers_removal_list","action":"App\Http\Controllers\PoultryController@broodersgrowersRemovalList"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/removal_sales_form\/{id}\/{type}","name":"farm.poultry.removal_sales_form","action":"App\Http\Controllers\PoultryController@removalSalesForm"},{"host":null,"methods":["POST"],"uri":"farm\/removal_sales_submit","name":"farm.poultry.removal_sales_submit","action":"App\Http\Controllers\PoultryController@submitSalesForm"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/removal_culling_form\/{id}\/{type}","name":"farm.poultry.removal_culling_form","action":"App\Http\Controllers\PoultryController@removalCullingForm"},{"host":null,"methods":["POST"],"uri":"farm\/removal_culling_submit","name":"farm.poultry.removal_culling_submit","action":"App\Http\Controllers\PoultryController@submitCullingForm"},{"host":null,"methods":["GET","HEAD"],"uri":"farm\/removal_mortality_form\/{id}\/{type}","name":"farm.poultry.removal_mortality_form","action":"App\Http\Controllers\PoultryController@removalMortalityForm"},{"host":null,"methods":["GET","HEAD"],"uri":"login\/google","name":null,"action":"App\Http\Controllers\Auth\LoginController@redirectToProvider"},{"host":null,"methods":["GET","HEAD"],"uri":"login\/google\/callback","name":null,"action":"App\Http\Controllers\Auth\LoginController@handleProviderCallback"},{"host":null,"methods":["GET","HEAD"],"uri":"logout","name":null,"action":"App\Http\Controllers\Auth\LoginController@logout"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

