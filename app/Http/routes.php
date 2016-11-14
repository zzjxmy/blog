<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::resource('home','Index\IndexController');

Route::get('welcome','Index\WelcomeController@index');

Route::get('show','Index\WelcomeController@show')->name('a');

Route::get('relations','Index\WelcomeController@relations');
Route::get('session','Index\WelcomeController@session');
Route::get('redis','Index\WelcomeController@redis');
Route::get('cookie','Index\WelcomeController@cookie');
Route::get('queue','Index\WelcomeController@queue');
//获取实例 四种方法获取实例
//直接使用make方式解析
//$generalServiceOne = $this->app->make(App\ServiceTest\GeneralService::class);
//全局函数实现，调用的还是make方法
//$generalServiceTwo = app(App\ServiceTest\GeneralService::class);
//数组访问，获取app的应用实例 之前注册过
//$generalServiceThree = $this->app[App\ServiceTest\GeneralService::class];
//facades外观解析
//$generalServiceFour = \App::make(App\ServiceTest\GeneralService::class);


