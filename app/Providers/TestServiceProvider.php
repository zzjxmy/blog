<?php

namespace App\Providers;

use App\ServiceTest\GeneralService;
use App\ServiceTest\InstanceService;
use App\ServiceTest\SingleService;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    //是否缓存
    protected $defer = true;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GeneralService::class,GeneralService::class);
        $this->app->bind(SingleService::class,SingleService::class);
        $instance = new InstanceService();
        $this->app->instance('instanceService',$instance);
    }
    
    //如果服务注册缓存，需要返回服务提供者绑定服务的名称
    public function provides ()
    {
        return [
            GeneralService::class,
            SingleService::class,
            'instanceService',
        ];
    }
}
