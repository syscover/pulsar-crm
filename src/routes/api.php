<?php

/*
|----------------------------------
| GROUPS
|----------------------------------
*/
Route::get('api/v1/crm/group',                  'Syscover\Crm\Controllers\GroupController@index')->name('pulsar.crm.group.index');
Route::get('api/v1/crm/group/{id}',             'Syscover\Crm\Controllers\GroupController@show')->name('pulsar.crm.group.show');
Route::post('api/v1/crm/group',                 'Syscover\Crm\Controllers\GroupController@store')->name('pulsar.crm.group.store');
Route::post('api/v1/crm/group/search',          'Syscover\Crm\Controllers\GroupController@search')->name('pulsar.crm.group.search');
Route::put('api/v1/crm/group/{id}',             'Syscover\Crm\Controllers\GroupController@update')->name('pulsar.crm.group.update');
Route::delete('api/v1/crm/group/{id}',          'Syscover\Crm\Controllers\GroupController@destroy')->name('pulsar.crm.group.destroy');

/*
|----------------------------------
| CUSTOMER
|----------------------------------
*/
Route::post('api/v1/crm/customer/has_user',     'Syscover\Crm\Controllers\CustomerController@hasUser')->name('pulsar.crm.customer.has_user')->middleware('web');

