<?php

Route::get('/', function () {
    //echo "23232";
    //return 123;
    //$name = 'binh';
    return view('welcome');
}); 


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
