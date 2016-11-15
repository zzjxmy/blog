<?php

Route::group(['namespace' => 'Index', 'middleware' => 'web'], function (){
    Route::get('/','IndexController@index');
});
