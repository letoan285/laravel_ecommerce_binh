<?php

Route::get('/create-product', function () {

    return "them moi san pham";
}); 

Route::get('/products', 'ProductController@index')->name('products.index');

Route::get('/categories', 'CategoryController@index')->name('categories.index');

Route::post('/categories', 'CategoryController@store')->name('categories.store');

Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
Route::get('/categories/{id}', 'CategoryController@show')->name('categories.show');
Route::post('/categories/{id}/delete', 'CategoryController@destroy')->name('categories.destroy');

Route::get('/dashboard', 'CategoryController@dashboard');

Route::resource('/profiles', 'ProfileController');


Route::resource('/users', 'UserController');

Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/create', 'ProductController@create')->name('products.create');

Route::get('products/{id}', 'ProductController@show')->name('products.show');
Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');

Route::get('tags/{id}/products', 'TagController@getProductByTagId');
Route::post('/products', 'ProductController@store')->name('products.store');
Route::get('/products/{id}/delete', 'ProductController@destroy')->name('products.destroy');