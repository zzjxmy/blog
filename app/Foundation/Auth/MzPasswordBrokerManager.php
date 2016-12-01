<?php

namespace App\Foundation\Auth;

use InvalidArgumentException;
use Illuminate\Auth\Passwords\PasswordBrokerManager;

class MzPasswordBrokerManager extends PasswordBrokerManager
{
    /**
     * Resolve the given broker.
     *
     * @param  string  $name
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     *
     * @throws \InvalidArgumentException
     */
    protected function resolve($name)
    {
        $config = $this->getConfig($name);
        
        if (is_null($config)) {
            throw new InvalidArgumentException("Password resetter [{$name}] is not defined.");
        }
        
        return new MzPasswordBroker(
            //Token
            $this->createTokenRepository($config),
            //UserProvider 对象
            $this->app['auth']->createUserProvider($config['provider']),
            //Mailer 对象
            $this->app['mailer'],
            //auth.emails.password 邮件视图
            $config['email']
        );
    }
}
