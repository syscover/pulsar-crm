<?php

/*
|----------------------------------
| GROUPS
|----------------------------------
*/
Route::get('api/v1/crm/group',                                       ['as' => 'crmGroup',                          'uses' => 'Syscover\Crm\Controllers\GroupController@index']);
Route::get('api/v1/crm/group/{id}',                                  ['as' => 'showCrmGroup',                      'uses' => 'Syscover\Crm\Controllers\GroupController@show']);
Route::post('api/v1/crm/group',                                      ['as' => 'storeCrmGroup',                     'uses' => 'Syscover\Crm\Controllers\GroupController@store']);
Route::post('api/v1/crm/group/search',                               ['as' => 'searchCrmGroup',                    'uses' => 'Syscover\Crm\Controllers\GroupController@search']);
Route::put('api/v1/crm/group/{id}',                                  ['as' => 'updateCrmGroup',                    'uses' => 'Syscover\Crm\Controllers\GroupController@update']);
Route::delete('api/v1/crm/group/{id}',                               ['as' => 'destroyCrmGroup',                   'uses' => 'Syscover\Crm\Controllers\GroupController@destroy']);

