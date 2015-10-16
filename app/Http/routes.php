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

Route::get('test', 'TestController@index');

Route::group(['prefix'=> 'admin' ], function(){

    Route::group(['prefix' => 'categories'], function(){

        Route::get('/list', ['as' => 'categories.list', 'uses' => 'AdminCategoriesController@index']);
        Route::get('/create', ['as' => 'categories.create', 'uses' => 'AdminCategoriesController@form']);
        Route::post('/store', ['as' => 'categories.store', 'uses' => 'AdminCategoriesController@create']);
        Route::get('/edit/{id}', ['as' => 'categories.edit', 'uses' => 'AdminCategoriesController@form']);
        Route::post('/update', ['as' => 'categories.update', 'uses' => 'AdminCategoriesController@update']);
        Route::get('/delete/{id}', ['as' => 'categories.delete', 'uses' => 'AdminCategoriesController@update']);

    });

    Route::group(['prefix' => 'products'], function(){

        Route::get('/list', ['as' => 'products.list', 'uses' => 'AdminProductsController@index']);
        Route::get('/create', ['as' => 'products.create', 'uses' => 'AdminProductsController@form']);
        Route::post('/store', ['as' => 'products.store', 'uses' => 'AdminProductsController@create']);
        Route::get('/edit/{id}', ['as' => 'products.edit', 'uses' => 'AdminProductsController@form']);
        Route::post('/update', ['as' => 'products.update', 'uses' => 'AdminProductsController@update']);
        Route::get('/delete/{id}', ['as' => 'products.delete', 'uses' => 'AdminProductsController@update']);

    });

});

