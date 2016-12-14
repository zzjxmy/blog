<?php

namespace App\Http\Controllers\Api;

use \Illuminate\Http\Request;
use \GatewayClient\Gateway;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class UserController extends ApiController {
    protected $request;
    
    public function __construct(Request $request){
        $this->request = $request;
    }
    
    public function bindUserBySocketId(){
        if($this->request->input('socketId')){
            //bind
            Gateway::$registerAddress = config('chat.registerAddress');
            Gateway::bindUid($this->request->input('socketId'), Auth::user()->id);
            return $this->responseJson(['isBind' => true]);
        }
        return $this->responseJson(['isBind' => false]);
    }
}