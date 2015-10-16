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

        Route::get('/', ['as' => 'categories', 'uses' => 'AdminCategoriesController@index']);
        Route::get('/add', ['as' => 'add.form', 'uses' => 'AdminCategoriesController@form']);
        Route::post('/add', ['as' => 'add.submit', 'uses' => 'AdminCategoriesController@create']);
        Route::get('/edit/{id}', ['as' => 'edit.form', 'uses' => 'AdminCategoriesController@form']);
        Route::post('/edit', ['as' => 'edit.submit', 'uses' => 'AdminCategoriesController@update']);
        Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'AdminCategoriesController@update']);

    });

    Route::group(['prefix' => 'products'], function(){

        Route::get('/', ['as' => 'products', 'uses' => 'AdminProductsController@index']);
        Route::get('/add', ['as' => 'add.form', 'uses' => 'AdminProductsController@form']);
        Route::post('/add', ['as' => 'add.submit', 'uses' => 'AdminProductsController@create']);
        Route::get('/edit/{id}', ['as' => 'edit.form', 'uses' => 'AdminProductsController@form']);
        Route::post('/edit', ['as' => 'edit.submit', 'uses' => 'AdminProductsController@update']);
        Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'AdminProductsController@update']);

    });

});

