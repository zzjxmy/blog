<?php

namespace App\Providers;

use App\Foundation\Auth\MzEloquentUserProvider;
use App\Model\Blog;
use App\Policies\BlogPolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     * 注册授权策略
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Blog::class => BlogPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
    
        //注册新的Eloquent服务
        \Auth::provider('mz-eloquent', function ($app, $config) {
            return new MzEloquentUserProvider($this->app['hash'], $config['model']);
        });
    }
}
