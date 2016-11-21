<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
    
        //全局限制(参数)
        $router->pattern('id', '[A-Za-z-]{20}');
        //调用map方法
        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     * 为应用定义路由
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        //创建一个路由组，将配置路由加载进去
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/Routes/routes.php');
        });
    }
}
