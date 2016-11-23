<?php

namespace App\Foundation\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContact;

class MzEloquentUserProvider extends EloquentUserProvider {
    /**
     * 复写密码对比方法
     * @param \Illuminate\Contracts\Auth\Authenticatable $user
     * @param array $credentials
     * @return bool
     */
    public function validateCredentials ( UserContact $user , array $credentials )
    {
        return $user->getAuthPassword() == md5($credentials['password']);
    }
}