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

Route::get('id' , [0-9]);

Route::group(['prefix'=> 'admin', 'middleware' => ['auth', 'admin.client'], 'where' => ['id' => '[0-9]+']], function(){

    Route::group(['prefix' => 'categories'], function(){

        Route::get('', ['as' => 'categories.list', 'uses' => 'AdminCategoriesController@index']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::post('', ['as' => 'categories.store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('edit/{id}', ['as' => 'categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('update/{id}', ['as' => 'categories.update', 'uses' => 'AdminCategoriesController@update']);
        Route::get('delete/{id}', ['as' => 'categories.delete', 'uses' => 'AdminCategoriesController@destroy']);

    });

    Route::group(['prefix' => 'products'], function(){

        Route::get('', ['as' => 'products.list', 'uses' => 'AdminProductsController@index']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'AdminProductsController@create']);
        Route::post('', ['as' => 'products.store', 'uses' => 'AdminProductsController@store']);
        Route::get('edit/{id}', ['as' => 'products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('update/{id}', ['as' => 'products.update', 'uses' => 'AdminProductsController@update']);
        Route::get('delete/{id}', ['as' => 'products.delete', 'uses' => 'AdminProductsController@destroy']);

        Route::group(['prefix' => 'images'], function(){

            Route::get('{id}/product', ['as' => 'products.images', 'uses' => 'AdminProductsController@images']);
            Route::get('create/{id}/product', ['as' => 'products.image.create', 'uses' => 'AdminProductsController@createImage']);
            Route::post('store/{id}/product', ['as' => 'products.image.store', 'uses' => 'AdminProductsController@storeImage']);
            Route::get('destroy/{id}/image', ['as' => 'products.image.destroy', 'uses' => 'AdminProductsController@destroyImage']);

        });

    });

});

Route::get('', 'StoreController@index');
Route::get('/home', 'StoreController@index');

Route::get('category/{id}', ['as' => 'category.store', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as' => 'product.store', 'uses' => 'StoreController@product']);
Route::get('tag/{id}', ['as' => 'tag.store', 'uses' => 'StoreController@tag']);

Route::group(['prefix' => 'cart'], function(){
    Route::get('', ['as' => 'cart', 'uses' => 'CartController@index']);
    Route::get('add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
    Route::get('update/{id}/{qtd}', ['as' => 'cart.update', 'uses' => 'CartController@update']);
    Route::get('destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);
});

Route::get('checkout', ['middleware' => 'auth', 'as' => 'checkout', 'uses' => 'CheckoutController@place']);

Route::Controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('test', 'Test@index');