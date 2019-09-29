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
    Route::post('login', 'PassportController@login');
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
    Route::get('code/{slug}/{full?}', 'ProductController@getProductByCode');
    Route::get('search/{slug}/{full?}', 'ProductController@findProduct');
});

/**
 * ShoppingList group routes
 */
Route::prefix("shoppinglist")->group(function () {

    /**
     * Protected Routes
     */
    Route::middleware('auth:api')->group(function () {
        Route::get('', 'ShoppingListController@index');
        Route::post('', 'ShoppingListController@store');
        Route::get('{id}', 'ShoppingListController@show');
        Route::put('{id}', 'ShoppingListController@update');
        Route::delete('{id}', 'ShoppingListController@destroy');
    });
});

/**
 * ShoppingListItem group routes
 */
Route::prefix("shoppinglistitem")->group(function () {
    /**
     * Protected Routes
     */
    Route::middleware('auth:api')->group(function () {
        Route::get('', 'ShoppingListItemController@index');
        Route::post('', 'ShoppingListItemController@store');
        Route::get('{id}', 'ShoppingListItemController@show');
        Route::put('{id}', 'ShoppingListItemController@update');
        Route::delete('{id}', 'ShoppingListItemController@destroy');
    });
});

/**
 * ShoppingList group routes
 */
Route::prefix("stocklist")->group(function () {

    /**
     * Protected Routes
     */
    Route::middleware('auth:api')->group(function () {
        Route::get('', 'StockListController@index');
        Route::post('', 'StockListController@store');
        Route::get('{id}', 'StockListController@show');
        Route::put('{id}', 'StockListController@update');
        Route::delete('{id}', 'StockListController@destroy');
    });
});

/**
 * ShoppingListItem group routes
 */
Route::prefix("stocklistitem")->group(function () {
    /**
     * Protected Routes
     */
    Route::middleware('auth:api')->group(function () {
        Route::get('', 'StockListItemController@index');
        Route::post('', 'StockListItemController@store');
        Route::get('{id}', 'StockListItemController@show');
        Route::put('{id}', 'StockListItemController@update');
        Route::delete('{id}', 'StockListItemController@destroy');
    });
});
