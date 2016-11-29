<?php

namespace App\Foundation\Auth;

use Illuminate\Support\Facades\Password;

class MzPassword extends Password {
    protected static function getFacadeAccessor()
    {
        return 'mz-password-manager';
    }
}