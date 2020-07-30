<?php

use Illuminate\Support\Facades\Route;
Route::get('permissions', 'PermissionController@index')->name('permissions.index');
Route::post('permissions', 'PermissionController@store')->name('permission.store');
Route::delete('permissions/{permission}/delete', 'PermissionController@destroy')->name('permission.destroy');
Route::get('permissions/{permission}/edit', 'PermissionController@edit')->name('permission.edit');
Route::PATCH('permissions/{permission}/update', 'PermissionController@update')->name('permission.update');
