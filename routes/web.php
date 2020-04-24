<?php
Route::group(['namespace' => 'Sieudd\Rolepermission\Http\Controllers', 'prefix' => 'api'], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('citys', 'CityController');
    Route::resource('stores', 'StoreController');
});
