<?php
/**
 * 服务容器本身实例化
 * 基础服务提供者注册
 * 核心类别名注册
 * 基本路径注册
 */
$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

/**
 * 服务绑定(注册)，将这些类，放到服务容器中application
 */
//WEB核心类
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);
//命令行核心类
$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);
//异常处理类
$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

//普通绑定（回调绑定） 也可以直接绑定对象，也可指定命名空间
//$app->bindings
//$app->bind(App\ServiceTest\InstanceService::class,function($app){
//    return new App\ServiceTest\InstanceService();
//});

//$instance = new App\ServiceTest\InstanceService();
//$app->bind(App\ServiceTest\InstanceService::class,$instance);

//$app->bind('instanceService',App\ServiceTest\InstanceService::class);

//单例绑定（回调绑定）如果第三参数为false 则为普通绑定 因为singleton调用的就是bind
//$app->bindings
//$app->singleton(App\ServiceTest\SingleService::class,function($app){
//   return new App\ServiceTest\SingleService();
//});

//普通绑定（实例绑定）
//$app->instances
//$instance = new App\ServiceTest\GeneralService();
//$app->instance('instanceService',$instance);

//$app->instance('instanceService',App\ServiceTest\GeneralService::class);

//返回容器对象
return $app;
