<?php

/*
|----------------------------------
| GROUPS
|----------------------------------
*/
Route::get('api/v1/crm/groups',                                       ['as' => 'group',                          'uses' => 'Syscover\Crm\Controllers\GroupController@index']);
Route::get('api/v1/crm/groups/{id}',                                  ['as' => 'showGroup',                      'uses' => 'Syscover\Crm\Controllers\GroupController@show']);
Route::post('api/v1/crm/groups',                                      ['as' => 'storeGroup',                     'uses' => 'Syscover\Crm\Controllers\GroupController@store']);
Route::post('api/v1/crm/groups/search',                               ['as' => 'searchGroup',                    'uses' => 'Syscover\Crm\Controllers\GroupController@search']);
Route::put('api/v1/crm/groups/{id}',                                  ['as' => 'updateGroup',                    'uses' => 'Syscover\Crm\Controllers\GroupController@update']);
Route::delete('api/v1/crm/groups/{id}',                               ['as' => 'destroyGroup',                   'uses' => 'Syscover\Crm\Controllers\GroupController@destroy']);

