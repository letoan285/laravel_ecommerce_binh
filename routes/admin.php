<?php

Route::get('/create-product', function () {

    return "them moi san pham";
}); 

Route::get('/products', 'ProductController@index')->name('products.index');

Route::get('/categories', 'CategoryController@index')->name('categories.index');

Route::get('/categories/create', 'CategoryController@create')->name('categories.create');

Route::get('/dashboard', 'CategoryController@dashboard');