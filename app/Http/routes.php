<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('id' , [0-9]);

Route::group(['prefix'=> 'admin' ], function(){

    Route::group(['prefix' => 'categories'], function(){

        Route::get('/', ['as' => 'categories.list', 'uses' => 'AdminCategoriesController@index']);
        Route::get('/create', ['as' => 'categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::post('/', ['as' => 'categories.store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('/edit/{id}', ['as' => 'categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('/update/{id}', ['as' => 'categories.update', 'uses' => 'AdminCategoriesController@update']);
        Route::get('/delete/{id}', ['as' => 'categories.delete', 'uses' => 'AdminCategoriesController@destroy']);

    });

    Route::group(['prefix' => 'products'], function(){

        Route::get('/', ['as' => 'products.list', 'uses' => 'AdminProductsController@index']);
        Route::get('/create', ['as' => 'products.create', 'uses' => 'AdminProductsController@create']);
        Route::post('/', ['as' => 'products.store', 'uses' => 'AdminProductsController@store']);
        Route::get('/edit/{id}', ['as' => 'products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('/update/{id}', ['as' => 'products.update', 'uses' => 'AdminProductsController@update']);
        Route::get('/delete/{id}', ['as' => 'products.delete', 'uses' => 'AdminProductsController@destroy']);

        Route::group(['prefix' => 'images'], function(){

            Route::get('/', ['as' => 'products.list', 'uses' => 'AdminProductsController@storeImage']);

        });

    });

});

