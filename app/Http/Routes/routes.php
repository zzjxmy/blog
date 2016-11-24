<?php
Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['namespace' => 'Index', 'middleware' => ['web']], function (){
    Route::get('/','IndexController@index');
    Route::get('/article/{id}','IndexController@article');
});

Route::group(['namespace' => 'Index', 'middleware' => ['auth']], function(){
    Route::match(['get', 'post'], 'publish', 'BlogController@publish');
});
