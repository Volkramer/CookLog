<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Users group routes
 */
Route::prefix('user')->group(function () {
    Route::post('login', 'PassportController@login')->name('login');
    Route::post('register', 'PassportController@register');

    /**
     * Protected Routes
     */
    Route::middleware('auth:api')->group(function () {
        Route::get('profil', 'PassportController@details');
        Route::post('logout', 'PassportController@logout');
    });
});

/**
 * Products group routes
 */
Route::prefix('product')->group(function () {
    Route::get('code/{slug}', 'ProductController@getProductByCode');
    Route::get('search/{slug}', 'ProductController@findProduct');
});
