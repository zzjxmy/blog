<?php

namespace App\Providers;

use App\Foundation\Auth\MzPasswordBroker;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;
use Queue;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //队列执行前调用
        Queue::after(function (JobProcessed $event) {
            // $event->connectionName
            // $event->job
            // $event->data
        });
        
        //队列执行失败调用
        Queue::failing(function (JobFailed $event){
            
        });
        //设置地区
        \Carbon\Carbon::setLocale('zh');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
