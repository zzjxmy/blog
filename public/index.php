<?php

/**
 * 1、自动加载 autoload (composer)
 * 2、初始化容器 app
 * 3、注册初始化服务（Event、Route）（依赖注入、控制反转）
 * 4、设置服务别名 如 router => Illuminate\Routing\Router
 * 5、设置请求路径（设置配置文件路径 session cache database storage） 2-5 Illuminate\Foundation\Application __construct()
 * 6、设置路由请求的中间件（组）Illuminate\Foundation\Http\Kernel __construct()
 * 7、初始化request实例，获取请求数据，处理并封住request对象，供response使用 Symfony\Request
 * 8、请求处理，前期准备工作（环境监测、配置加载、日志配置、异常处理、外观处理、服务提供者注册、启动服务） Illuminate\Foundation\Http\Kernel handle()
 * 9、路由配置信息加载（routes.php） App\Providers\RouteServiceProvider
 * 9、中间件的处理（请求前事件）(装饰者模式) Illuminate\Foundation\Http\Kernel sendRequestThroughRouter() Illuminate\Pipeline\Pipeline __construct()
 * 10、路由匹配并处理(controller model view) 优先调用路由中间件
 * 11、控制器生成响应
 * 12、发送请求内容 Symfony\Response
 * 13、结束请求（调用中间件请求后事件）
 * */

//自动加载
require __DIR__.'/../bootstrap/autoload.php';

//服务容器的实例化和基本注册
//控制反转，依赖注入 bind make 回调函数
$app = require_once __DIR__.'/../bootstrap/app.php';

//核心类实例化(之前在bootstrap->app.php中注册了)
//Illuminate\Contracts\Http\Kernel->App\Http\Kernel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

//response 请求实例化
$response = $kernel->handle(
    //request 对请求实例化封装
    $request = Illuminate\Http\Request::capture()
);
//发送响应内容
$response->send();
//结束请求 执行全局($middleware)中间件中的terminate方法
$kernel->terminate($request, $response);
