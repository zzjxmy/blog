<?php

namespace App\Foundation\Facade;

use Illuminate\Support\Facades\Facade;

class MzPasswordResetFacade extends Facade {
    protected static function getFacadeAccessor(){
        return 'mz-password';
    }
}