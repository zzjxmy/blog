<?php

namespace App\Providers;

use App\Foundation\Auth\MzPasswordBrokerManager;
use Illuminate\Support\ServiceProvider;

class MzPasswrodResetProvider extends ServiceProvider
{
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
        //自定义PasswordManager Extends PasswordBrokerManager
        $this->app->singleton('mz-password-manager',function($app){
             return new MzPasswordBrokerManager($app);
        });
    
        //自定义PasswordBroker Extends PasswordBroker
        $this->app->singleton('mz-password-broker',function($app){
            return $this->app->make('mz-password-manager')->broker();
        });
    }
    
    public function provides ()
    {
        return ['mz-password-manager', 'mz-password-broker'];
    }
}
