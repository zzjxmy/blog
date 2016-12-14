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
        $clientId = $this->request->input('socketId');
        if($clientId){
            //bind
            Gateway::$registerAddress = config('chat.registerAddress');
            //如果之前已经连接过，清除之前的连接
            if(session('isBind')){
                Gateway::closeClient(session('isBind'));
            }
            Gateway::bindUid($clientId, Auth::user()->id);
            //设置已经绑定
            session()->set('isBind',$clientId);
            return $this->responseJson(['isBind' => true]);
        }
        return $this->responseJson(['isBind' => false]);
    }
}