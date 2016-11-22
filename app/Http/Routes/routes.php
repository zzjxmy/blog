<?php
Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['namespace' => 'Index', 'middleware' => ['web','auth']], function (){
    Route::get('/','IndexController@index');
    Route::get('/article/{id}','IndexController@article');
});

Route::group(['namespace' => 'Index', 'middleware' => []], function(){
    Route::match(['get', 'post'], 'publish', 'BlogController@publish');
});
