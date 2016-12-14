<?php
Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['namespace' => 'Index', 'middleware' => ['web']], function (){
    Route::get('/','IndexController@index');
    Route::get('/article/{id}','IndexController@article');
    Route::get('/search/tag/{name}','IndexController@searchTag');
    Route::get('/search/subject/{name}','IndexController@searchSubject');
    Route::get('/search/user/{name}','IndexController@searchUser');
    Route::get('/subjects','IndexController@subjects');
    Route::get('/tags','IndexController@tags');
});

Route::group(['namespace' => 'Index', 'middleware' => ['auth']], function(){
    Route::get('/user/blog','BlogController@blogList');
    Route::match(['get', 'post'], '/publish', 'BlogController@publish');
    Route::post('/img/upload', 'BlogController@postUpload');
    Route::get('/blog/delete/{blogId}','BlogController@delete');
    Route::match(['get','post'],'/blog/update/{blogId}','BlogController@update');
});

Route::group(['namespace' => 'Api','middleware' => ['api']],function(){
   Route::get('/checkUserIsLogin','PublicController@checkUserIsLogin');
});

Route::group(['namespace' => 'Api','middleware' => ['api','auth']],function(){
    Route::post('/bindUserBySocketId','UserController@bindUserBySocketId');
});
