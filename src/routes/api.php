<?php

/*
|----------------------------------
| GROUPS
|----------------------------------
*/
Route::get('api/v1/countries/{lang?}',                             ['as' => 'country',                         'uses' => 'Syscover\Admin\Controllers\CountryController@index']);
Route::get('api/v1/countries/{id}/{lang}',                         ['as' => 'showCountry',                     'uses' => 'Syscover\Admin\Controllers\CountryController@show']);
Route::post('api/v1/countries',                                    ['as' => 'storeCountry',                    'uses' => 'Syscover\Admin\Controllers\CountryController@store']);
Route::put('api/v1/countries/{id}/{lang}',                         ['as' => 'updateAction',                    'uses' => 'Syscover\Admin\Controllers\CountryController@update']);
Route::delete('api/v1/countries/{id}/{lang?}',                     ['as' => 'destroyAction',                   'uses' => 'Syscover\Admin\Controllers\CountryController@destroy']);

