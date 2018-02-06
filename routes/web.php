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

Route::middleware(['access'])->group(function () {
    Route::get('/', 'HomeController@index');
    Route::prefix('category')->group(function () {
        Route::get('/', 'CategoryController@index');
        Route::post('add', 'CategoryController@doAdd');
    });
    Route::prefix('merchant')->group(function () {
        Route::get('/', 'MerchantController@index');
        Route::post('add', 'MerchantController@doAdd');
    });
    Route::prefix('source')->group(function () {
        Route::get('/', 'SourceController@index');
        Route::post('add', 'SourceController@doAdd');
    });
});
Route::get('test', 'TestController@index');
Route::get('login', 'AccessController@login');
Route::post('login', 'AccessController@doLogin');
Route::get('logout', 'AccessController@logout');
