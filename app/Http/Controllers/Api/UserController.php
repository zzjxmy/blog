<?php

namespace App\Http\Controllers\Api;

use \Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class UserController extends ApiController {
    protected $request;
    
    public function __construct(Request $request){
        $this->request = $request;
    }
    
    public function bindUserBySocketId(){
        //bind
        
    }
}