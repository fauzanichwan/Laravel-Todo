<?php

Route::get('/', 'ItemController@index');
Route::get('/item/deleteAll', 'ItemController@destroyAll');
Route::post('/item', 'ItemController@store');
Route::delete('/item/deleteSelected', 'ItemController@destroySelected');
Route::get('/item/{id}/delete', 'ItemController@destroy');
