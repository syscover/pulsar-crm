<?php

/*
|----------------------------------
| GROUPS
|----------------------------------
*/
//Route::get('api/v1/crm/group',                  'Syscover\Crm\Controllers\GroupController@index')->name('api.crm_group.index');
//Route::get('api/v1/crm/group/{id}',             'Syscover\Crm\Controllers\GroupController@show')->name('api.crm_group.show');
//Route::post('api/v1/crm/group',                 'Syscover\Crm\Controllers\GroupController@store')->name('api.crm_group.store');
//Route::post('api/v1/crm/group/search',          'Syscover\Crm\Controllers\GroupController@search')->name('api.crm_group.search');
//Route::put('api/v1/crm/group/{id}',             'Syscover\Crm\Controllers\GroupController@update')->name('api.crm_group.update');
//Route::delete('api/v1/crm/group/{id}',          'Syscover\Crm\Controllers\GroupController@destroy')->name('api.crm_group.destroy');

/*
|----------------------------------
| ADDRESS
|----------------------------------
*/
Route::put('api/v1/crm/address/{id}',           'Syscover\Crm\Controllers\AddressController@update')->name('pulsar.crm.address.update');

/*
|----------------------------------
| CUSTOMER
|----------------------------------
*/
Route::post('api/v1/crm/customer/has_user',     'Syscover\Crm\Controllers\CustomerController@hasUser')->name('pulsar.crm.customer.has_user')->middleware('web');

