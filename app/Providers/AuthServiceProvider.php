<?php

namespace App\Providers;

use App\Foundation\Auth\MzEloquentUserProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
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
