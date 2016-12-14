<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class PublicController extends ApiController  {
    
    public function checkUserIsLogin()
    {
        return $this->responseJson(['isLogin' => !Auth::guest()]);
    }
}